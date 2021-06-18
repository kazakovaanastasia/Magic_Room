<?php
function can_go($h){
    $pool=$h->pool;
    $can =" You can go";
    if ($pool[$h->x][$h->y]->u==1){
        $can .= " up";
    }

    if ($pool[$h->x][$h->y]->d==1){
        $can .= " down";
    }

    if ($pool[$h->x][$h->y]->l==1){
        $can .= " left";
    }

    if ($pool[$h->x][$h->y]->r==1){
        $can .= " right";
    }
    return $can;}

function if_able($h,$dir){
    print("MMM $dir");
    $pool=$h->pool;
    if ($dir=="1" and $pool[$h->x][$h->y]->u!=1){
        return 0;
    }

    if ($dir=="2" and $pool[$h->x][$h->y]->d!=1){

        return 0;
    }

    if ($dir=="3" and $pool[$h->x][$h->y]->l!=1){
        return 0;
    }

    if ($dir=="4" and $pool[$h->x][$h->y]->r!=1){
        return 0;
    }
    if ($dir!=1 and $dir!=2 and $dir!=3 and $dir!=4){
        return 0;
    }
    return 1;

}
?>