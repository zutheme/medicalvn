<?php
function request_question(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $input = json_decode(file_get_contents('php://input'),true);
    $idpost = $input['idpost'];  
    //date_default_timezone_set('Asia/Ho_Chi_Minh');
    //$result ="idpost: ".$idpost;
    $team_query = new WP_Query( array(
                    'post_type' => 'trac_nghiem',
                    'p' => $idpost,
                )); 

            if ($team_query->have_posts()) {
              while ($team_query->have_posts()) {
                $team_query->the_post();  
                    $id = get_the_ID();
                    $title = get_the_title($idpost);
                    $content = apply_filters('the_content', get_post_field('post_content', $idpost));
                    //$content = get_the_content($id);
                    $question_a = get_post_meta( $idpost, 'question-a', true );
                    $question_b = get_post_meta( $idpost, 'question-b', true );
                    $question_c = get_post_meta( $idpost, 'question-c', true );
                    $question_d = get_post_meta( $idpost, 'question-d', true );
                    $question_e = get_post_meta( $idpost, 'question-e', true );
                    $question_f = get_post_meta( $idpost, 'question-f', true );
                    $lst_quest = array();
                    if(!empty($question_a)){
                      $lst_quest[] = $question_a;
                    }
                    if(!empty($question_b)){
                      $lst_quest[] = $question_b;
                    }
                    if(!empty($question_c)){
                      $lst_quest[] = $question_c;
                    }
                    if(!empty($question_d)){
                      $lst_quest[] = $question_d;
                    } 
                    if(!empty($question_e)){
                      $lst_quest[] = $question_e;
                    }
                    if(!empty($question_f)){
                      $lst_quest[] = $question_f;
                    }           
                }
              wp_reset_postdata();
              echo json_encode(array('error'=>'','idpost'=>$idpost,'title'=>$title,'content'=>$content,'list-quest'=>$lst_quest));
                die();   
        }else{
            echo json_encode(array('error'=>'','title'=>''));
            die();
        } 
        echo json_encode(array('error'=>'error','title'=>''));
        die();        
}
add_action( 'wp_ajax_request_question', 'request_question' );
add_action( 'wp_ajax_nopriv_request_question', 'request_question');
if(!function_exists('get_curent_slug_custom_taxonomy')){
    function get_curent_slug_custom_taxonomy(){
    //echo "get_curent_slug_custom_taxonomy";
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
    //echo $term->name; 
    return $term->slug; 
  }
}

function outresult(){
    wp_verify_nonce('my-special-string', 'security');
    $input = json_decode(file_get_contents('php://input'),true);
    $jsonstring = $input["data"];
    $term_id = $input["idpost"];
    $str_char = array('A','B','C','D','E','F');
    $boardresult = array(0,0,0,0,0,0);    
    $listresult = json_decode($jsonstring, true);
    foreach ($listresult as $item) {
       $string = $item["ans"];
       $char_answer = explode (",", $string);
       foreach ($char_answer as $char) {
          foreach ($str_char as $key => $value) {
              if(strcmp($value,$char)==0){
                  $boardresult[$key] += 1;
              }
          }
       }
    }
    $max = 0;$max_i = 0;
     for ($i=0; $i < count($boardresult); $i++) { 
        if($boardresult[$i] > $max) {
          $max = $boardresult[$i];
          $max_i = $i;
        }
     }
    $rschar = strtolower($str_char[$max_i]);
    $head ='';$content='';$link = '';
    $term_custom_fields = get_option("taxonomy_term_$term_id");
    if($term_custom_fields){
      $head = $term_custom_fields["depart_quiz_head_$rschar"];
      $content = $term_custom_fields["depart_quiz_content_$rschar"];
      $link = $term_custom_fields["depart_quiz_read_more_$rschar"];
    }
    echo json_encode(array('head'=>$head,'content'=>$content,'link'=>$link));
    die();      
}
add_action( 'wp_ajax_request_post_idcat', 'request_post_idcat' );
add_action( 'wp_ajax_nopriv_request_post_idcat', 'request_post_idcat');
//request id post by category 
function listcheckcat(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $input = json_decode(file_get_contents('php://input'),true);
    $idcat = $input['idcate'];  
    //date_default_timezone_set('Asia/Ho_Chi_Minh');
    $args = array(
        'post_type' => 'trac_nghiem',
        'posts_per_page' => 10,
        'post_parent' => 0,
        'tax_query' => array(
            array(          
                'taxonomy' => 'depart_trac_nghiem',
                'field' => 'term_id',
                'terms' => array($idcat),
                'operator' => 'IN'
            )
         )
    );
    $list = array();
    $team_query = new WP_Query($args); 
    if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            $team_query->the_post();  
                $id = get_the_ID();
                $title = get_the_title($idpost);
                $link = get_permalink($idpost);
                //$listsubject = get_post_meta( $id, 'listsubject', true );
                $list[] = array('idpost'=>$id,'title'=>$title,'link'=>$link);
            }
          wp_reset_postdata();
          echo json_encode($list);
            die();   
    }
    echo json_encode(array('idpost'=>'','title'=>''));
    die();        
}
add_action( 'wp_ajax_listcheckcat', 'listcheckcat' );
add_action( 'wp_ajax_nopriv_listcheckcat', 'listcheckcat');
//add question
function addquestion(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $input = json_decode(file_get_contents('php://input'),true);
    $title = $input['title_question_more'];
    $idparent = $input['idparent'];   
    //date_default_timezone_set('Asia/Ho_Chi_Minh');
    $post_data = array(
        'post_title' => $title,
        'post_content' => '',
        'post_author'  => get_current_user_id(),
        'post_type' => 'trac_nghiem',
        'post_status'  => 'private',
        'post_parent'  => $idparent,
    );
    $post_id = wp_insert_post( $post_data );
    //$permalink = get_permalink($post_id);
     $args = array(
        'post_type' => 'trac_nghiem',
        'posts_per_page'  => -1,
        'post_status'  => 'private',
        'post_parent__in' => array($idparent),  
        'order' => 'asc',
        //'post_parent' => $idparent
    );
    $list = array();
    $team_query = new WP_Query($args); 
    if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            $team_query->the_post();  
                $id = get_the_ID();
                $title = get_the_title($idpost);
                //$link = get_permalink($idpost);
                $link = get_edit_post_link($id,'');
                //$listsubject = get_post_meta( $id, 'listsubject', true );
                $list[] = array('idpost'=>$id,'title'=>$title,'link'=>$link);
            }
          wp_reset_postdata();
          echo json_encode($list);
            die();   
    }
    echo json_encode(array('idpost'=>'','title'=>''));
    die();           
}
add_action( 'wp_ajax_addquestion', 'addquestion' );
add_action( 'wp_ajax_nopriv_addquestion', 'addquestion');
//load post by idparent
function loadquestion(){
    $input = json_decode(file_get_contents('php://input'),true);
    $idparent = $input['idparent'];   
    $args = array(
        'post_type' => 'trac_nghiem',
        'posts_per_page'  => -1,
        'post_status'  => 'private',
        'post_parent__in' => array($idparent),  
        'order' => 'asc',
        //'post_parent' => $idparent
    );
    $list = array();
    $team_query = new WP_Query($args); 
    if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            $team_query->the_post();  
                $id = get_the_ID();
                $title = get_the_title($id);
                //$link = get_permalink($id);
                $link = get_edit_post_link($id,'');
                //$listsubject = get_post_meta( $id, 'listsubject', true );
                $list[] = array('idpost'=>$id,'title'=>$title,'link'=>$link);
            }
          wp_reset_postdata();
          echo json_encode($list);
            die();   
    }
    echo json_encode(array('idpost'=>$idparent,'title'=>''));
    die();           
}
add_action( 'wp_ajax_loadquestion', 'loadquestion' );
add_action( 'wp_ajax_nopriv_loadquestion', 'loadquestion');
//add quiz abc
function addquizabc(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $input = json_decode(file_get_contents('php://input'),true);
    $post_id = $input['hiddenidpost'];
    $list_quiz = $input['list_quiz'];
    //update_post_meta( $post_id, 'list_quiz', $list_quiz );    
    //$list = array();
     //echo $list_image;
     //wp_die();
    echo json_encode(array('hiddenidpost'=>$post_id, 'list_quiz'=>$list_quiz));
    wp_die();          
}
add_action( 'wp_ajax_addquizabc', 'addquizabc' );
add_action( 'wp_ajax_nopriv_addquizabc', 'addquizabc');
?>