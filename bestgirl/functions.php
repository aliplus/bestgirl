<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/


/* 文章点赞 */

function agreeNum($cid, &$record = NULL)
{
    $db = Typecho_Db::get();
    $callback = array(
        'agree' => 0,
        'recording' => false
    );

    //  判断点赞数量字段是否存在
    if (array_key_exists('agree', $data = $db->fetchRow($db->select()->from('table.contents')->where('cid = ?', $cid)))) {
        //  查询出点赞数量
        $callback['agree'] = $data['agree'];
    } else {
        //  在文章表中创建一个字段用来存储点赞数量
        $db->query('ALTER TABLE `' . $db->getPrefix() . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 0;');
    }

    //  获取记录点赞的 Cookie
    //  判断记录点赞的 Cookie 是否存在
    if (empty($recording = Typecho_Cookie::get('__typecho_agree_record'))) {
        //  如果不存在就写入 Cookie
        Typecho_Cookie::set('__typecho_agree_record', '[]');
    } else {
        $callback['recording'] = is_array($record = json_decode($recording)) && in_array($cid, $record);
    }

    //  返回
    return $callback;
}

function agree($cid)
{
    $db = Typecho_Db::get();
    $callback = agreeNum($cid, $record);

    //  获取点赞记录的 Cookie
    //  判断 Cookie 是否存在
    if (empty($record)) {
        //  如果 cookie 不存在就创建 cookie
        Typecho_Cookie::set('__typecho_agree_record', "[$cid]");
    } else {
        //  判断文章是否点赞过
        if ($callback['recording']) {
            //  如果当前文章的 cid 在 cookie 中就返回文章的赞数，不再往下执行
            return $callback['agree'];
        }
        //  添加点赞文章的 cid
        array_push($record, $cid);
        //  保存 Cookie
        Typecho_Cookie::set('__typecho_agree_record', json_encode($record));
    }

    //  更新点赞字段，让点赞字段 +1
    $db->query('UPDATE `' . $db->getPrefix() . 'contents` SET `agree` = `agree` + 1 WHERE `cid` = ' . $cid . ';');

    //  返回点赞数量
    return ++$callback['agree'];
}