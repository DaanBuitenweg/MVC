<?php

class Output {
    function __construct() {
        try {

        } catch (PDOexception $e) {

        }
    }
    function __destruct() {}

    function createTable ($result, $act, $id_colum_name='id') {
        // , $controller, $uniquecolum, $pages, $addcheckboxes

        $tableheader = false;
        $html = "<div style= 'overflow-x:auto'>";
        $html .= "<table>";

        While ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($tableheader == false) {
                $html .= "<tr>";
                // $html .= ($addcheckboxes == true);
                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= '<th>actions</th>';
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                if ($key == 'product_price') {
                    $str_replace = str_replace('.', ',', $value);
                    $html .= "<td data-title='($key)'>€{$str_replace}</td>";

                }else {
                    $html .= "<td data-title='($key)'>{$value}</td>";
                }
            }

            $id = $row[$id_colum_name];
            //action button
            $html .= "<td>";
            $html .= "<a href= index.php?act=" . $act . "&op=read&id=" . $id . "> <button><i class='fa fa-leanpub'></i>read</button> </a>";
            $html .= "<a href= index.php?act=" . $act . "&op=update&id=" . $id . "> <button><i class='fa fa-spinner fa-spin'></i>update</button> </a>";
            $html .= "<a href= index.php?act=" . $act . "&op=delete&id=" . $id ."> <button><i class='fa fa-close'></i>delete</button> </a>";
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table></div><br>";
        return $html;
    }

    function createButtons($pages, $act){
        $pages = 5;
        $html = "";
        for ($i=1; $i < $pages; $i++) {
            $html .= "<a href= index.php?act=$act&op=reads&page=" . $i . "> <button>" . $i . "</button> </a>";
        }
        return $html;

    }
}

    // function createSelectbox($result){
    //     $html = "<select>";
    //     foreach ($result as $row) {
    //         foreach ($row as $key => $value) {
    //             $words = explode(" ", $value);
    //             $html .= "<option value='{$words[0]}'>{$words[0]}</option>";
    //         }
    //     }
    //     $html .= "</select>";
    //     return $html;
    // }
