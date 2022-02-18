<fieldset>
    <legend>Social media linked accounts</legend>
    <?php foreach($social_arr as $social){
        $field->text("theme_settings[$social]", $social, $options[$social], $req, $desc, $css_class);
    }?>    
</fieldset>