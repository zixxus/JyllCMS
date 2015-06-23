<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/13/14
 * Time: 12:09 AM
 */
class Jyll_menu {
    /*
      <a id='' class='' href=''><p>''</p></a>
     */

    function __construct() {
        $class = Jyll::selected_class();
    }

    public function build_menu() {

        $class = Jyll::selected_class();
        $own = Jyll_owner::check_own();
        $c = 0;
        if (method_exists($class, 'return_menu')) {
            $menu = $class::return_menu();
//print_r($menu);
            $return = '';



            foreach ($menu[$own] as $link => $texts) {

//print_r($text);

                $text = $texts;
                if ($link != null) {
                    $return .= "<menus id='$link'>";

                    foreach ($texts as $link => $text) {

                        $action = $text['action'];
                        if (is_array($text)) {



                            if ($text['text'] == null || $text['link'] == null) {
                                Jyll::get_error('Takie menu nie moze zostac zbudowane');
                            } else {

                                if ($text['id'] == null) {
                                    $text['id'] = $text['text'];
                                }

                                if ($text['class'] == null) {
                                    $text['class'] = $text['text'];
                                }
                                $address = HOMEPAGE . $text['link'];
                                $write = $text['text'];
                                $id = $text['id'];
                                $class = $text['class'];

                                $return .= "<a id='$id' $action class='$class' href='$address'><p>$write</p></a>";
                            }
                        } else {
                            $address = HOMEPAGE . $link;
                            $return .= "<a id='$text' $action class='$text' href='$address'><p>$text</p></a>";
                        }
                    }

                    if ($link != null) {
                        $return .= "</menus>";
                    }
                } else {

                    if (is_array($text)) {



                        if ($text['text'] == null || $text['link'] == null) {
                            Jyll::get_error('Takie menu nie moze zostac zbudowane');
                        } else {

                            if ($text['id'] == null) {
                                $text['id'] = $text['text'];
                            }

                            if ($text['class'] == null) {
                                $text['class'] = $text['text'];
                            }
                            $address = HOMEPAGE . $text['link'];
                            $write = $text['text'];
                            $id = $text['id'];
                            $class = $text['class'];

                            $return .= "<a id='$id' $action class='$class' href='$address'><p>$write</p></a>";
                        }
                    } else {
                        $address = HOMEPAGE . $link;
                        $return .= "<a id='$text' $action class='$text' href='$address'><p>$text</p></a>";
                    }
                }
                $c++;
            }
//            return $return;
        }
    }

    function requiremenu() {
        $url = Jyll::url();
//    print_r($url);
        $link = 'views/' . $url[0] . '/_menu.php';
        if (file_exists($link)) {
            require $link;
        }
    }

    public function make($label, $link = '', $own, $attr = '', $on = '') {
        
        if(is_array($own)){
            $search = array_search(Jyll_owner::check_own(), $own);
            if($search != null or $search == 0){
                $own = $own[$search];
            }
        }
        
        if ($own == Jyll_owner::check_own()) {
            if ($attr != null) {
                $at = '';
                foreach ($attr as $k => $v) {
                    $at .= $k . '="' . $v . '" ';
                }
            }

            if ($link == '#') {
                $l = '#';
            } else if ($link != null || $link != '#') {
                $l = HOMEPAGE . $link;
            }
            if ($link != '') {
                $menu = "<a  $at href='$l' $on > <p>$label</p> </a>";
            } else {
                $menu = "<a  $at $on > <p>$label</p> </a>";
            }


            return $menu;
        } else if ($own == "all") {
            if ($attr != null) {
                $at = '';
                foreach ($attr as $k => $v) {
                    $at .= $k . '="' . $v . '" ';
                }
            }

            if ($link == '#') {
                $l = '#';
            } else if ($link != null || $link != '#') {
                $l = HOMEPAGE . $link;
            }
            if ($link != '') {
                $menu = "<a  $at href='$l' $on > <p>$label</p> </a>";
            } else {
                $menu = "<a  $at $on > <p>$label</p> </a>";
            }


            return $menu;
        }
    }

}
