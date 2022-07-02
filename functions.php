<?php
register_nav_menus(
	array(
		'primary' => 'Header navigation',
		'footer'  => 'footer-nav',
	)
);

/**
 * update_profile_fields
 * ユーザ情報にカスタムカラムを追加する
 */
function update_profile_fields($contactmethods)
{
	//項目の削除
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	//項目の追加
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['github'] = 'GitHub';
	$contactmethods['qiita'] = 'Qiita';

	return $contactmethods;
}
add_filter('user_contactmethods', 'update_profile_fields', 10, 1);
