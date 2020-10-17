<?php
/**
 *      ****  *  *     *  ****  ****  *    *
 *      *  *  *  * *   *  *  *  *  *   *  *
 *      ****  *  *  *  *  *  *  *  *    *
 *      *     *  *   * *  *  *  *  *   *  *
 *      *     *  *    **  ****  ****  *    *
 * @author   Pinoox
 * @license  https://opensource.org/licenses/MIT MIT License
 */

namespace pinoox\app\com_pinoox_paper\model;

use pinoox\component\Date;
use pinoox\component\User;

class PostModel extends PaperDatabase
{
    public static function insert($data)
    {
        $date = Date::g('Y-m-d H:i:s');
        return self::$db->insert(self::post, [
            'user_id' => User::get('user_id'),
            'title' => $data['title'],
            'summary' => $data['summary'],
            'context' => $data['context'],
            'status' => $data['status'],
            'insert_date' => $date,
            'update_date' => $date,
        ]);
    }

    public static function update($data)
    {
        $date = Date::g('Y-m-d H:i:s');
        self::$db->where('post_id', $data['post_id']);
        return self::$db->update(self::post, [
            'title' => $data['title'],
            'summary' => $data['summary'],
            'context' => $data['context'],
            'update_date' => $date,
            'status' => $data['status'],
        ]);
    }

    public static function delete($post_id)
    {
        self::$db->where('post_id', $post_id);
        return self::$db->delete(self::post);
    }

    public static function fetch_by_id($post_id)
    {
        self::$db->join(self::user . ' u', 'u.user_id=p.user_id', 'LEFT');
        self::$db->where('p.post_id', $post_id);
        return self::$db->getOne(self::post . ' p', 'p.*,CONCAT(u.fname," ",u.lname) full_name,u.avatar_id');
    }

    public static function fetch_all($limit = null, $isCount = false)
    {
        self::$db->join(self::user . ' u', 'u.user_id=p.user_id', 'LEFT');
        self::$db->orderBy('p.insert_date', 'DESC');
        $result = self::$db->get(self::post . ' p', $limit, 'p.*,CONCAT(u.fname," ",u.lname) full_name,u.avatar_id');
        if ($isCount) return self::$db->count;
        return $result;
    }

    public static function insert_tags($post_id, $tags)
    {

        self::delete_tags_by_post_id($post_id);
        if (empty($tags))
            return;
        foreach ($tags as $t) {
            if (is_array($t))
                $t = $t['tag_name'];

            $tag = TagModel::fetch_by_name($t);


            if (empty($tag)) {
                $tag_id = TagModel::insert($t);
            } else {
                $tag_id = $tag['tag_id'];
            }
            if ($tag_id && $tag_id > 0) self::insert_tag($post_id, $tag_id);
        }
    }

    public static function fetch_all_tags($limit = null, $isCount = false)
    {
        self::$db->join(self::tag . ' t', 't.tag_id=pt.tag_id');
        self::$db->groupBy('t.tag_id,t.tag_name');

        $tags = self::$db->get(self::post_tag . ' pt', $limit, 't.tag_id,t.tag_name');
        return $isCount ? self::$db->count : $tags;
    }

    public static function fetch_tags_by_post_id($post_id)
    {
        self::$db->join(self::tag . ' t', 't.tag_id=pt.tag_id');
        self::$db->where('pt.post_id', $post_id);
        return self::$db->get(self::post_tag . ' pt');
    }

    public static function insert_tag($post_id, $tag_id)
    {
        return self::$db->insert(self::post_tag, [
            'post_id' => $post_id,
            'tag_id' => $tag_id,
        ]);
    }

    private static function delete_tags_by_post_id($post_id)
    {
        self::$db->where('post_id', $post_id);
        return self::$db->delete(self::post_tag);
    }

    public static function where_tag_name($keyword)
    {
        if (!empty($keyword)) {
            $keyword = '%' . $keyword . '%';
            self::$db->where('t.tag_name LIKE ?', [$keyword]);
        }
    }

    public static function where_status($status)
    {
        if (!is_null($status))
            self::$db->where('p.status', $status);
    }

    public static function sort($sort)
    {
        if (!empty($sort) && isset($sort['field']) && !empty($sort['field'])) {
            if ($sort['field'] === 'approx_insert_date')
                $sort['field'] = 'insert_date';

            self::$db->orderBy($sort['field'], $sort['type']);
        }

    }

    public static function search_keyword($keyword)
    {
        if (!empty($keyword)) {
            $p = '%' . $keyword . '%';
            self::$db->where('p.title LIKE ? OR p.summary', [$p]);
        }
    }

}