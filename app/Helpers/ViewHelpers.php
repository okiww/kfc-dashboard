<?php

/**
 * Function for get ordinal numbers
 * @param array object  $data
 * @param int           $currentIndex
 * @param string        $numberName
 * @return array object with number
 */
if (! function_exists('get_ordinal_numbers')) {
    function get_ordinal_numbers($data, $currentIndex = 1, $numberName = 'no')
    {
        if (is_object($data)) {
            foreach ($data as $key => $value) {
                $value->{$numberName} = $currentIndex;
                $currentIndex++;
            }

            return $data;
        }
    }
}

/**
 * Function for render string icon font awesome
 * @param string    $icon
 * @return html
 */
if (! function_exists('print_icon')) {
    function print_icon($icon)
    {
        if (strpos($icon, 'fa ') !== false) {
            return '<i class="' . $icon . '"></i>';
        } elseif (strpos($icon, 'fa-') !== false) {
            return '<i class="fa ' . $icon . '"></i>';
        } else {
            return null;
        }
    }
}

/**
 * Function for render string icon font awesome
 * @param string    $icon
 * @return html
 */
if (! function_exists('build_tree')) {
    function build_tree(array $elements, $parentId = null)
    {
        $tree = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = build_tree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $tree[] = $element;
            }
        }

        return $tree;
    }
}

/**
 * Function for render string icon font awesome
 * @param string    $icon
 * @return html
 */
if (! function_exists('check_child')) {
    function check_child(array $elements, &$treeView = null)
    {
        foreach ($elements as $element) {
            $hasChildren = false;

            if (isset($element['children']) && sizeof($element['children']) > 0) {
                $hasChildren = true;
            }

            if ($hasChildren) {
                $treeView[] = $element['id'];
                check_child($element['children'], $treeView);
            }
        }

        return $treeView;
    }
}