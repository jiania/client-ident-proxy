<?php 
require_once 'log.php';
require_once 'proxy-pass.php';

jsondb_logger_init('vancl');

forward(function(&$url, &$data_to_post, &$headers)
{
}, 
function($info, &$headers, &$body)
{
	$body= preg_replace('/(<body.*?>)/i', '$1<img src=\"http://www.doctorcom.com/statics/images/style2012/logo.jpg\" \/>\n', $body, 1);
/*
	$body= preg_replace('/(<body.*?>)/i', '$1<img src=\"http://iambrony.dget.cc/mlp/gif/212381__safe_animated_scootaloo_vector_artist-deadparrot22.gif_001.gif\" \/>\n', $body, 1);
*/
	$url = $info['url'];
	jsondb_logger('nofity', 'REP '.get_content_type($headers), ['url'=>$url,'info'=>$info,'headers'=>$headers,'body'=>$body]);
});


