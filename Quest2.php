<?php
function getSelectBox(array $arr):string {
    return '<select>'.array_reduce($arr,function ($carry,$item){
                        return ($carry.=('<option>'.((string)($item)).'</option>'));
        },'').'</select>';
}

echo getSelectBox(['a',1,2.3]);