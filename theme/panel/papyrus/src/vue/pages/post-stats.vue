<template>
    <div class="page">
        <div class="menubar">
            <div class="items">
                <div class="text m1-rl">
                    <router-link tag="span" :to="{name:'posts'}" class="icon">
                        <i class="fa fa-chevron-right"></i> {{LANG.post.posts_list}}
                    </router-link>
                </div>
            </div>
        </div>

        <simplebar class="simplebar">
            <div class="menubar">
                <div class="items">
                    <router-link :to="{name:'write'}" tag="div" class="item">
                        {{LANG.post.write}}
                    </router-link>
                </div>
            </div>
            <div class="container" v-if=" post!=null">
                <div class="post-stats">

                    <section class="section">
                        <div class="post-title">
                            <div class="label">{{LANG.post.analysis}}</div>
                            <div class="title">{{_isNull(post.title) ? post.draft_title : post.title}}</div>
                            <div class="details">{{LANG.post.published}}: {{post.approx_insert_date}}</div>
                        </div>
                    </section>

                    <div v-if="hasStats">
                        <section class="section" v-if="monthly!=null">
                            <div class="section-title">
                                <h2>{{LANG.post.stats_post}}</h2>
                            </div>
                            <div class="section-content">
                                <row :gutter="0" :columns="1" class="box-group">
                                    <column :sm="1" :md="1" :lg="1">
                                        <apexchart type="bar"
                                                   :options="monthlyOpts"
                                                   :height="monthlyOpts.chart.height"
                                                   :width="monthlyOpts.chart.width"
                                                   :series="monthly"></apexchart>
                                    </column>
                                </row>
                            </div>
                        </section>

                        <section class="section" v-if="stats!=null">
                            <div class="section-title">
                                <h2>{{LANG.post.stats_7_days}}</h2>
                            </div>
                            <div class="section-content">
                                <row :gutter="50" :columns="3" class="box-group">
                                    <column :sm="3" :md="4" :lg="1">
                                        <div class="box box3">
                                            <div class="details">
                                                <h3>{{stats.visits.total}}</h3>
                                                <h4>{{LANG.post.visits}}</h4>
                                            </div>
                                            <apexchart type="line"
                                                       :width="220"
                                                       :height="80"
                                                       :options="miniBoxOpts"
                                                       :series="stats.visits.series"></apexchart>
                                        </div>
                                    </column>
                                    <column :sm="3" :md="4" :lg="1">
                                        <div class="box box4">
                                            <div class="details">
                                                <h3>{{stats.visitors.total}}</h3>
                                                <h4>{{LANG.post.visitors}}</h4>
                                            </div>
                                            <apexchart type="line"
                                                       :width="220"
                                                       :height="80"
                                                       :options="miniBoxOpts"
                                                       :series="stats.visitors.series"></apexchart>
                                        </div>
                                    </column>
                                    <column :sm="3" :md="4" :lg="1">
                                        <div class="box box2">
                                            <div class="details">
                                                <h3>{{stats.visitors.total}}</h3>
                                                <h4>{{LANG.post.comments}}</h4>
                                            </div>
                                            <apexchart type="line"
                                                       :width="220"
                                                       :height="80"
                                                       :options="miniBoxOpts"
                                                       :series="stats.visitors.series"></apexchart>
                                        </div>
                                    </column>
                                </row>
                            </div>
                        </section>

                        <section class="section" v-if="devices!=null">
                            <div class="section-title">
                                <h2>{{LANG.post.stats_devices}}</h2>
                            </div>
                            <div class="section-content">
                                <row :gutter="12" :columns="1" class="box-group">
                                    <column :sm="1" :md="1" :lg="1">
                                        <div class="box center" v-if="devices!=null">
                                            <apexchart
                                                    ref="devicesChart"
                                                    type="radialBar"
                                                    :width="350"
                                                    :height="350"
                                                    :options="radialOpts"
                                                    :series="devices.percents"></apexchart>
                                        </div>
                                    </column>
                                </row>
                            </div>
                        </section>
                    </div>
                    <div v-else class="section">
                        <div class="empty-message">
                            <div class="text"><span class="icon"><i class="fas fa-chart-line"></i></span>
                                {{LANG.post.empty_stats}}
                            </div>
                            <div @click="$router.go(-1)" class="btn btn-simple btn-sm">{{LANG.panel.back}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </simplebar>
    </div>
</template>

<script>
    export default {
        props: ['post_id'],
        data() {
            return {
                hasStats: false,
                post: null,
                stats: null,
                devices: null,
                monthly: null,
                miniBoxOpts: {
                    chart: {
                        type: 'line',

                        sparkline: {
                            enabled: true
                        },
                        dropShadow: {
                            enabled: true,
                            top: 1,
                            left: 1,
                            blur: 2,
                            opacity: 0.2,
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                        },
                        formatter: function (val, opts) {
                            if (val > 0)
                                return val
                        },
                        background: {
                            enabled: true,
                            foreColor: '#506E93',
                            padding: 1,
                            borderRadius: 1,
                            opacity: 1,
                        },

                    },
                    stroke: {
                        //curve: 'smooth',
                        width: 1
                    },
                    markers: {
                        size: 0
                    },
                    grid: {
                        padding: {
                            top: 20,
                            bottom: 20,
                            left: 80,
                            right: 20
                        }
                    },
                    colors: ['#fff'],
                    tooltip: {
                        x: {
                            show: false,
                        },
                        y: {
                            title: {
                                formatter: function formatter(val) {
                                    return '';
                                }
                            }
                        }
                    },

                },
                monthlyOpts: {
                    chart: {
                        type: 'bar',
                        height: 350,
                        width: '100%',
                        fontFamily: 'IranSans',
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '75%',
                        },
                    },
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: []
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return " " + val
                            }
                        }
                    }
                },
            }
        },
        computed: {
            radialOpts() {
                return {
                    chart: {
                        type: 'radialBar',
                        fontFamily: 'IranSans',
                    },
                    stroke: {
                        lineCap: 'round'
                    },
                    labels: [],
                    plotOptions: {
                        radialBar: {
                            dataLabels: {
                                name: {
                                    fontSize: "22px"
                                },
                                value: {
                                    fontSize: "16px"
                                },
                                total: {
                                    show: true,
                                    label: this.LANG.panel.total,
                                    formatter: function (w) {
                                        return '100%';
                                    }
                                }
                            }
                        }
                    },
                    legend: {
                        show: true,
                        floating: true,
                        fontSize: '10px',
                        position: 'center',
                        offsetX: 0,
                        offsetY: 0,
                        formatter: function (seriesName, opts) {
                            return '%' + seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
                        },
                    },
                };
            },
        },
        methods: {
            getPost() {
                return this.$http.post(this.URL.API + 'post/get/' + this.post_id).then((json) => {
                    this.post = json.data;
                });
            },
            getStats() {
                return this.$http.post(this.URL.API + 'post/getStats/' + this.post_id).then((json) => {
                    this.stats = json.data;
                });
            },
            getDevices() {
                return this.$http.post(this.URL.API + 'post/getDevices/' + this.post_id).then((json) => {
                    this.devices = json.data;
                    this.radialOpts.labels = json.data.labels;
                });
            },
            getMonthly() {
                return this.$http.post(this.URL.API + 'post/getMonthly/' + this.post_id).then((json) => {
                    this.monthly = json.data.series;
                    this.monthlyOpts.xaxis.categories = json.data.date;
                });
            },
            getHasStats() {
                return this.$http.post(this.URL.API + 'post/hasStats/' + this.post_id).then((json) => {
                    return this.hasStats = json.data;
                });
            },
        },
        created() {
            this.getPost().then(() => {
                return this.getHasStats();
            }).then((hasStats) => {
                if (!hasStats) return false;

                this.getMonthly().then(() => {
                    return this.getStats();
                }).then(() => {
                    return this.getDevices();
                })
            });
        },
    }
</script>

<style lang="less">
    .apexcharts-legend {
        justify-content: center;
    }

    .apexcharts-legend.apexcharts-align-center.position-right {
        position: relative !important;
        right: 0 !important;
        top: -2px !important;
        width: 100% !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: center !important;

        .apexcharts-legend-marker {
            margin: 0 2px;
        }
    }

    .apexcharts-legend-text {
        position: relative;
        right: 1px;
        top: -3px;
    }

    .center .apexcharts-canvas {
        margin: auto;
    }

</style>