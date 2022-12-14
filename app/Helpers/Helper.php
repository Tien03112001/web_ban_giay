<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '<tr>
                            <td>' . $menu->id . '</td>
                            <td>' . $char . $menu->name . '</td>
                            <td>' . self::active($menu->active) . '</td>
                            <td>' . $menu->updated_at . '</td>
                            <td>
                            <a href="/admin/menu/edit/' . $menu->slug . '"  class="btn btn-success btn-md">Cập nhật</a>
                            <a   onclick="removeRow(' . $menu->id . ', \'/admin/menu/destroy\')" class="btn btn-danger btn-md">xóa</a>
                            </td>
                        </tr>';
                unset($menus[$key]);
                $html .= self::menu($menus, $menu->id, '--');
            }
        }
        return $html;
    }
    public static function comment($comments)
    {
        $html = '';
        foreach ($comments as $key => $comment) {
            $html .= '<tr>
                            <td>' . $comment->id . '</td>
                            <td>' . $comment->product->name . '</td>
                             <td>' . $comment->content . '</td>
                            <td>' . self::active($comment->active) . '</td>
                            <td>' . $comment->updated_at . '</td>
                            <td>
                            <a href="/product/' . $comment->product_id . '"  class="btn btn-success btn-md">Xem chi tiết bình luận</a>
                            <a   onclick="removeRow(' .  $comment->id . ', \'/admin/comment/destroy\')" class="btn btn-danger btn-md">xóa</a>
                            </td>
                        </tr>';
        }
        return $html;
    }
    public static function active($active): string
    {
        return $active == 1 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
}
