<?php
/* * * *
 * Class: FormFields
 * Version: 5
 * Date: 30 June, 2020
 * Description: Creates form fields & displays. 
 * Fields: text, textarea, radio, checkbox, multiselect=multiselect checkboxes, country, date,select, file upload,
 * * * * */
class FormFields{
    public $label_col;
    public $input_col;//IN LATER VERSIONS
                     //|form name, id, action, 
                    // |user meta, post, custom
                   //  |Ajax call to send, and for individual field
/********************|TEXT|**********************/
    public function text($name, $label, $dbval = null, $req = null, $placeholder=null, $desc = null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <input class="form-control <?=($css_class != ""?$css_class:'');?>" type="text" id="<?=$name?>" name="<?=$name?>" value="<?=($dbval != ""?$dbval:'');?>" <?=($req != ""?'required="required"':'');?> placeholder="<?=$placeholder?>">
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|TEXTAREA|**********************/
    public function textarea($name, $label, $dbval = null, $req = null,$desc= null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <textarea class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>><?=($dbval != ""?$dbval:'');?></textarea>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|RADIO|**********************/
    public function radio($name, $label, $dbval = null, $req = null, $values=null,$desc= null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <?php foreach($values as $value){?>
              <label> <?php $value_label = $this->clean($value);$value_label = ucfirst($value); echo $value_label;?>&nbsp;
              <input type="radio" value="<?=$value?>" <?=$value==$dbval?'checked="checked"':'';?>  class="<?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>/>
              </label>&nbsp;&nbsp;&nbsp;
              <?php }?>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|CHECKBOX|**********************/
    public function checkbox($name, $label, $dbval = null, $req = null, $value=null,$desc= null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              
              <label> <?php //$value_label = $this->clean($value);$value_label = ucfirst($value); echo $value_label;?>&nbsp;&nbsp;
              <input type="checkbox" value="<?=$value?>" <?=$value==$dbval?'checked="checked"':'';?>  class="<?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>/>
              </label>&nbsp;&nbsp;
              
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|MULTISELECT|**********************/
    public function multiple($name, $label, $dbval = null, $req = null, $values=null, $desc= null, $css_class = null, $perLine = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <style>.one{width:99%;}.two{width:49%;}.three{width:32%;}.four{width:24%;}.multi_val{display:inline-block;text-align:left;}</style>
             <?php 
                  switch ($perLine) {
                      case 1:
                        $perLine=  'one';
                          break;
                      case 2:
                        $perLine=  'two';
                          break;
                      case 3:
                        $perLine=  'three';
                          break;
                      case 4:
                        $perLine=  'four';
                          break;

                      default:
                        $perLine=  'one';
                          break;
                  }?>
              <?php foreach($values as $value){?>
              <label class="<?=$perLine;?> multi_val"> <?php $value_label = $this->clean($value);$value_label = ucfirst($value); echo $value_label;?>&nbsp;
              <input type="checkbox" value="<?=$value?>" <?php if($dbval!=""){?><?=in_array($value,$dbval)?'checked="checked"':'';?><?php }?>  class="<?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>[]" <?=($req != ""?'required="required"':'');?>/>
              </label>
              <?php }?>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/////
public function multiselect($name, $id, $dbval = null, $req = null, $values, $desc= null, $css_class = null) {?>
     <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
    <select class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$id?>" name="<?=$name?>[]" <?=($req != ""?'required="required"':'');?> multiple="multiple">
        <option value=''>Select</option>
          <?php  foreach ($values as $value) { echo $dbval;?>
    <option value="<?=$value?>" <?php if($dbval!=""){?><?=in_array($value,$dbval)?'selected="selected"':'';?><?php }?>><?= ucfirst($value);?></option>
    <?php  }?>  
    </select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
                        </div>
      </div>
    <?php }
    /********************|COUNTRIES|**********************/
    public function countries($name, $label, $dbval = null, $req = null, $desc = null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <?php $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
?> <select class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>>
    <option value=''>Select</option>
    <?php  foreach ($countries as $country) {?>
    <option value='<?=$country?>' <?=($country==$dbval)?"selected='selected'":'';?>><?= ucfirst($country);?></option>
    <?php  }?>
</select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|DATE|**********************/
    public function dmy($label,$day,$month,$year, $db_day = null,$db_month = null,$db_year = null, $req = null, $desc = null, $css_class = null) {?>
        <?php if($dbval != ""){ /*$dt = $dbval; $date = date("d M Y", strtotime($dt));*/}?>
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$day?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
            <select name="<?=$day?>" id="<?=$day?>" class="day" <?=($req != ""?'required="required"':'');?>>  
  <?php if (!empty($db_day)) { ?><option value='<?= $db_day; ?>' selectd><?= $db_day; ?></option><?php } ?>       
                                            <option value=''>Day</option>
        <?php for ($d = 1; $d <= 31; $d++) {
            echo "<option value='$d'>$d</option>";
        } ?>
                                        </select>
                                        <select name="<?=$month?>" id="<?=$month?>" class="month" <?=($req != ""?'required="required"':'');?>>
                                            <?php if (!empty($db_month)) { ?><option value='<?= $db_month; ?>' selectd><?= $db_month; ?></option><?php } ?>
                                            <option value=''>Month</option>              
        <?php
        $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        foreach ($months as $month) {
            echo "<option value='$month'>$month</option>";
        }
        ?>
                                        </select>

                                        <select name="<?=$year?>" id="<?=$year?>" class="year" <?=($req != ""?'required="required"':'');?>>
        
        <?php if (!empty($db_year)) { ?><option value='<?= $db_year; ?>' selectd><?= $db_year; ?></option><?php } ?>
                                            <option value=''>Year</option>
        <?php
        for ($y = 2018; $y >= 1970; $y--) {
            echo "<option value='$y'>$y</option>";
        }
        ?></select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }//ends date
/********************|FULLDATE|**********************/
    public function date($name, $label, $dbval = null, $req = null, $desc = null, $css_class = null) {?>
        <?php if($dbval != ""){$dt = $dbval;
        $date = date("d M Y", strtotime($dt));}?>
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <input class="form-control <?=($css_class != ""?$css_class:'');?>" type="text" id="<?=$name?>" name="<?=$name?>" value="<?=($dbval != ""?$date:'');?>" <?=($req != ""?'required="required"':'');?>>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
(function($){
  //$('head').append('<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript" />');
$('head').append('<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />');


        $('#<?=$name?>').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd mmm yyyy' 
        });

})(jQuery);
    </script>
<?php  }//ends date
/********************|SELECT|**********************/
public function select($name, $label, $dbval = null, $req = null, $options=null,$desc= null,  $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
 <select class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>>
    <option value=''>Select</option>
    <?php  foreach ($options as $option) {?>
    <option value='<?=$option?>' <?=($option==$dbval)?"selected='selected'":'';?>><?= ucfirst($option);?></option>
    <?php     }?>
</select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|UPLOAD|**********************/
    public function upload($name, $label, $dbval = null, $req = null, $desc = null, $css_class = null, $val = null/*this'll be new value*/) {?>
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>_file"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <input type="hidden" value="<?=($dbval!=""?$dbval:$val);?>" id="<?=$name?>" name="<?=$name?>" class="">
              <input class="<?=($css_class != ""?$css_class:'');?>" type="file" id="<?=$name?>_file" name="<?=$name?>_file" <?=($req != ""?'required="required"':'');?> accept="image/*" onChange="document.getElementById('<?=$name?>_img').src = window.URL.createObjectURL(this.files[0])"/>
              <button type="button" id="<?=$name?>_btn" class="btn btn-info btn-upload">Upload</button>
              <img src="<?=($dbval!=""?$dbval:'');?>" id="<?=$name?>_img" class="img-disp pull-right img-thumbnail" style="max-width:90px;"/>
              <div class="col-sm-12 text-danger" id="<?=$name?>_photo_resp"></div>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }//ends simple upload field
/********************|WORDPRESS COLORPICKER|**********************/
    public function wp_color($name, $label, $dbval = null, $req = null, $desc = null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
              <input class="form-control cpa-color-picker <?=($css_class != ""?$css_class:'');?>" type="text" id="<?=$name?>" name="<?=$name?>" value="<?=($dbval != ""?$dbval:'');?>" <?=($req != ""?'required="required"':'');?>>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|WORDPRESS UPLOADS|**********************/
    public function wp_upl($name, $label, $dbval = null, $id, $desc = null, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$id?>-btn"><?= ucfirst($this->clean($label));?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
                                
                    <input type="text" readonly name="<?=$name?>" id="<?=$id?>" value="<?= ($dbval  != "") ? ($dbval ) : ''; ?>" class="form-control col-sm-6" size="30" />
                    <input type="button" name="<?=$id?>" id="<?=$id?>-btn" class="btn btn-primary" value="Upload Image">
                    <div class="<?=$id?>_imagearea col-sm-3">
                        <div class="images_parent_class">
                            <div class="<?=$id?>-delete delete_btn">X</div>
                            <img src="<?= ($dbval  != "") ? ($dbval) : ''; ?>" id="<?=$id?>-img" class="<?= ($dbval  != "") ? 'img-thumbnail' : ''; ?>" style="margin-left: auto; margin-right: auto; display: block;"/>
                        </div>
                    </div>
            
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
                          <script>
                var $ = jQuery;
                jQuery(document).ready(function ($) {
                    $("#<?=$id?>-btn").click(function (e) {
                        e.preventDefault();
                        var image = wp.media({
                            title: "Upload Image",
                            // mutiple: true if you want to upload multiple files at once
                            multiple: false
                        }).open()
                                .on("select", function (e) {
                                    // This will return the selected image from the Media Uploader, the result is an object
                                    var uploaded_image = image.state().get("selection").first();
                                    // We convert uploaded_image to a JSON object to make accessing it easier
                                    // Output to the console uploaded_image
                                    console.log(uploaded_image);
                                    var image_url = uploaded_image.toJSON().url;
                                    // Lets assign the url value to the input field
                                    $('#<?=$id?>').val(image_url);
                                    $('#<?=$id?>-img').attr('src', image_url);
                                    $('#<?=$id?>-img').addClass();
                                    $('.<?=$id?>-delete').show();
                                });
                    });
                });
                $(document).on('click', '.<?=$id?>-delete', function () {
                    $('#<?=$id?>').val('');
                    $('#<?=$id?>-img').attr('src', '');
                    $('.<?=$id?>-delete').hide();
                });
            </script>
            <style>.<?=$id?>-delete{display: none;<?= ($dbval != "") ? 'display: block;' : '' ?> color: white;font-weight: bold;cursor: pointer;position: absolute;top: -10px;right: -10px;border: 2px solid red;border-radius: 50px;text-align: center; width: 18px;height: 18px;background-color: red;}
                .images_parent_class{display: inline-block;position:relative;width: 150px;height: 150px;}
                .images_parent_class img{max-width:100%;width:100%;height:auto;}.<?=$id?>_imagearea {float: right;}</style>
          </div>
      </div>
<?php  }//ends wp uploads
/********************|SELECT KEY VALUE ARRAY|**********************/
public function select_key_val($name, $label, $dbval = null, $req = null, $desc = null,$kv_arr, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
 <select class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>>
    <option value=''>Select</option>
    <?php  foreach ($kv_arr as $key => $value) {?>
    <option value='<?=$key?>' <?=($key==$dbval)?"selected='selected'":'';?>><?= ucfirst($value);?></option>
    <?php     }?>
</select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/********************|SELECT WP QUERY|**********************/
public function select_wpquery($name, $label, $dbval = null, $req = null, $desc = null,$wpquery,$key,$value, $css_class = null) {?>  
      <div class="form-group row">
          <div class="col-md-<?=($this->label_col ==""?'4':$this->label_col);?>"><label class="control-label text-right" for="<?=$name?>"><?= ucfirst($this->clean($label));?><?=($req!=null?'<span class="text-danger">*</span>':'');?></label></div>
          <div class="col-md-<?=($this->input_col ==""?'8':$this->input_col);?>">
 <select class="form-control <?=($css_class != ""?$css_class:'');?>" id="<?=$name?>" name="<?=$name?>" <?=($req != ""?'required="required"':'');?>>
    <option value=''>Select</option>
    <?php  foreach ($wpquery as $row) {?>
    <option value='<?=$row->$key?>' <?=($row->$key==$dbval)?"selected='selected'":'';?>><?= ucfirst($row->$value);?></option>
    <?php     }?>
</select>
              <div class="desc"><?=$desc!=""?$desc:'';?></div>
          </div>
      </div>
<?php  }
/* clean a string */
private function clean($str) {
    // Remove all characters except A-Z, a-z, 0-9
    $str = preg_replace('/[^A-Za-z0-9 -_]/', ' ', $str);
    // Replace sequences of spaces 
    $str = preg_replace('/  */', ' ', $str);
    $str = preg_replace('/-/', ' ', $str);
    $str = preg_replace('/_/', ' ', $str);
    return $str;
}

}
