<?php

/**
 * @file
 * The primary PHP file for this theme.
 */

function drhemant_preprocess_page(&$vars, $hook) {
	if (isset($vars['node'])) {
	  $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}
  }

function drhemant_menu_tree__main_menu(&$vars) {
  return '<ul class="nav navbar-nav">' . $vars['tree'] . '</ul>';
}

function get_site_last_update(){
	$last = t('');
	$timestamp = db_select('node', 'n')
		->fields('n', array('changed'))
		->condition('status', 1)
		->orderBy('changed', 'DESC')
		->range(0,1)
		->execute()
		->fetchField();
	$date = date('d M Y', $timestamp);
	return '<sup><i class="fa fa-edit"></i> '.$last.' '.$date.'</sup>';
}

function get_node_last_update(){
	$last = t('');
	$arg0 = arg(0);
	$arg1 = arg(1);
	$arg2 = arg(2);
	if($arg0 == "node" && is_numeric($arg1)){  
		$load_node = node_load($arg1);
		$timestamp = $load_node->changed;
		$date = date('d M Y', $timestamp);
		$date = '<sup><i class="fa fa-edit"></i> '.$last.' '.$date.'</sup>';
	}elseif($arg0 == "taxonomy" && $arg1 == "term" & is_numeric($arg2)){ 
		$query = db_select('node', 'n');
	    $query->join('taxonomy_index', 't', 'n.nid = t.nid'); //JOIN node with users
	    $query->fields('n',array('changed'))//SELECT the fields from node
			  ->condition('t.tid',$arg2,'=')
			  ->orderBy('changed', 'DESC')//ORDER BY created
			  ->range(0,1);//LIMIT to 2 records

	    $result = $query->execute()->fetchField();
	    $date = date('d M Y', $result);
		$date = '<sup><i class="fa fa-edit"></i> '.$last.' '.$date.'</sup>';
	}else{ 
		$timestamp = db_select('node', 'n')
							->fields('n', array('changed'))
							->condition('status', 1)
							->condition('type', $arg0)
							->orderBy('changed', 'DESC')
							->range(0,1)
							->execute()
							->fetchField();
		if($timestamp){
			$date = date('d M Y', $timestamp);
			$date = '<sup><i class="fa fa-edit"></i> '.$last.' '.$date.'</sup>';
		}else{
			$date = get_site_last_update();
		}
	}
	return $date;
}
