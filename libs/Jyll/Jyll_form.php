<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/24/14
 * Time: 12:42 AM
 */
class Jyll_form {
	function __construct() {
	}
	public function required_form($url, $array) {
		$url = $url;
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$alert = '';
			foreach ( $array as $k => $v ) {
				if (is_array ( $v )) {
					if (isset ( $v ['od'] )) {
						if (strlen ( $_POST [$k] ) < $v ['od']) {
							
							$alert .= $v ['name'] . " Zbyt krotkie, min znakow: " . $v ['od'];
						}
					}
					if (isset ( $v ['do'] )) {
						if (strlen ( $_POST [$k] ) > $v ['do']) {
							$alert .= $v ['name'] . " Zbyt dlugie, max znakow: " . $v ['do'];
						}
					}

					if(isset($v['system'])){
						if($v['system']=='email'){
							$email = $_POST[$k];
							if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
								
							$alert .= "Blad wynikajacy z emaila !";
								
							}
						}
					}
				} else {
					if (empty ( $_POST [$k] ) && $_POST[$k] != 0) {
						$alert .= 'Uzupelnij wymagane pole:' . $v . '<br />';
					}
				}
			}
			
			if ($alert != null) {
				
				$link = HOMEPAGE . $url . '?alert=' . urlencode ( $alert );
				
				header ( "Location:$link" );
				exit ();
			}
		}
	}
	public function makeform($action = "", $method = "", $id = "", $class = "", $name = "", $onclick = "", $enctype = 0) {
            
		$make = '';
		if ($action != null) {
			$action = 'action="' . $action . '"';
		}
		if ($method != null) {
			$method = 'method="' . $method . '"';
		}
		if ($id != null) {
			$id = 'id="' . $id . '"';
		}
		if ($class != null) {
			$class = 'class="' . $class . '"';
		}
		if ($name != null) {
			$name = 'name="' . $name . '"';
		}
		if ($onclick != null) {
			$onclick = 'onclick="' . $onclick . '"';
		}
		if ($enctype == 1) {
			$enctype = 'enctype="multipart/form-data"';
		}
		
		// <div id="formpostition">
		// <form action="" method="" id="" class="" name="" onclick="">
		$make = '<div id="formpostition">' . '<form ' . $action . $method . $id . $class . $name . $onclick . $enctype . '>';
		return $make;
	}
	public function endform() {
		$end = '</div>' . '</form>';
		return $end;
	}
	public function input($label = "", $type = "", $name = "", $action = "", $id = "", $req = 0, $value ='') {
		if ($type != null) {
			$type = 'type="' . $type . '"';
		}
		
		if ($name != null) {
			$name = 'name="' . $name . '"';
		}
		
		if ($id != null) {
			$id = 'id="' . $id . '"';
		}
		if ($value != null) {
			$value = ' value="' . $value . '" ';
		}
		
		if ($action != null) {
			$action = $action;
		}
		if ($req != 0) {
			$add = 'required';
		}
		
		$item = '<div id="form_div">
            <label id="formpostition_t">' . $label . '</label>
            <input ' . $type . $name . $action . $id . $add . $value.'>
            </div>';
		return $item;
	}
	public function textarea($label, $text, $name, $action,$placeholder,$req =0) {
		if ($text != null) {
			$text = $text;
		}
		
		if ($name != null) {
			$name = 'name="' . $name . '"';
		}
		
		if ($action != null) {
			$action = $action;
		}
		if($placeholder != null){
			$placeholder = ' placeholder='.$placeholder.' ';
		}

		if ($req != 0) {
			$add = 'required';
		}
		
		$item = '<div id="form_div">
            <label id="formpostition_t">' . $label . '</label>
            <textarea ' . $name . $action . $placeholder . $add .'>' . $text . '</textarea>
            </div>';
		return $item;
	}
	public function button($text = "", $type = "", $name = "") {
		$item = '
            <div id="form_div">
                <button id="btn_book" type="' . $type . '" name="' . $name . '">' . $text . '</button>
            </div>';
		return $item;
	}
	public function close_button() {
		$item = '<script>


    $( "#ajax_close_button" ).click(function() {
        $("#ajax_bg").fadeOut(1000,function(){
        $("#ajax_bg").remove();
        });
    });
</script>
                <button id="ajax_close_button">Close</button>
            ';
		return $item;
	}
	public function image_preview() {
		$item = '
<img id="preview"/>
<script>
    $(document).ready(function () {
        $("#prog").hide();
    })

    $("#zdjecie").change(function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    })

    function imageIsLoaded(e) {

        $("#preview").attr("src", e.target.result);
        $("#preview").attr("width", "250px");
        $("#preview").attr("height", "230px");
    };
</script>
            ';
		return $item;
	}
        
	public function Date_form_with_picker($label, $name, $req = 0) {
		if ($req == 1) {
			$req = 'required';
		} else {
			$req = '';
		}
		$item = '
    			
<script>
    $(document).ready(function () {
        $(".datepicker_' . $name . '").datepicker({
            dateFormat: "yy-mm-dd"
        });
    })

</script>
        		<div id="form_div">
            <label id="formpostition_t">' . $label . '</label>
            <input id="datepicker_' . $name . '" class="datepicker_' . $name . '" type="date"  name="' . $name . '">
            </div>
            ';
		
		return $item;
	}
	public function verefity_email($post) {
		if(isset($post)){
		$email = test_input($_POST[$post]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			Jyll::get_error(7);
			exit;
		}
		}
	}
}

