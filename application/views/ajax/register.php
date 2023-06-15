

<?php
$alert = "ยืนยันการสมัครเข้าหอพัก<br>";
$alert .= "กรณีสมัครหอพักออนไลน์แล้วให้ชำระเงินภายในระยะเวลาที่กำหนด ผ่านทาง Qr Codeในระบบบริการการศึกษา<br>";
$alert .= "หากไม่่ชำระตามระยะเวลาที่กำหนดจะตัดสิทธิ์การสมัครทันที";
?>


<div id="result-register"></div>

<div class="i-box">
    <div class="ibox-title">
        <h5>
        	<img src="images/<?=$perfix_img?>.jpg" width="25" height="25">
        	สมัครหอพัก<?=$gender?>
        </h5>
        <div class="ibox-tools">
        	{หอพัก<?=$gender?>}
        </div>
    </div>
    <div class="ibox-content">

    	<form id="frm_register" name="frm_register" class="form-horizontal">

    	<input name="gender" type="hidden" value="<?=$perfix_img?>">
        <input name="position" type="hidden" value="<?=$position?>">

        
        <div id="panel_<?=$time?>" class="panel-info"> 
    <div class="panel-heading">
        <strong>ผู้สมัครใหม่</strong> 
        <!--
        <span style="float:right">
            <a href="#" style="color:#fff" onclick="return remove_form('<?=$time?>')">
                x
            </a>
        </span>
        -->
    </div>
    <div class="panel-body">
    <div class="form-group">
        <label class="col-sm-3 control-label">
            Passport ID
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4"><input name="re_passport[]" id="re_passport_<?=$time?>" type="text" maxlength="11" placeholder="Passport ID" class="form-control" required></div>
                    <div class="col-md-4">
                    <input name="re_visa_id[]" id="re_visa_id_<?=$time?>" type="text" placeholder="VISA Student ID" maxlength="11" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
            Name-Surname
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4"><input name="re_fname[]" id="re_fname_<?=$time?>" type="text" placeholder="ชื่อ" class="form-control" required></div>
                    <div class="col-md-4">
                    <input name="re_lname[]" id="re_lname_<?=$time?>" type="text" placeholder="นามสกุล" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
            Student ID 11 หลัก
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                    <input name="re_code[]" id="re_code_<?=$time?>" type="text" placeholder="Student ID" maxlength="11" class="form-control re_code_<?=$time?> data_code" required onkeyup="return check_code(<?=$time?>)" onblur="return b_code(<?=$time?>)">
                    <span id="code_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                    <div class="col-md-4">
                        <select name="re_level_class[]" id="re_level_class_<?=$time?>" required class="form-control">
                            <option value="">--choose degree--</option>
                            <option value="5">Bachelor</option>
                            <option value="6">Master</option>
                            <option value="7">Doctor</option>
                           
                        </select>
                        <input name="re_gender" type="hidden" value="<?=$gender?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
        Faculty/College
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                        <select name="fac_id[]" id="fac_id_<?=$time?>" class="form-control" required>
                            <option value="">--choose--</option>
                            <?php foreach($facuty as $value): ?>
                            <option value="<?=$value->fac_id?>">
                                <?=$value->fac_name_en?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input name="re_subject[]" id="re_subject_<?=$time?>" type="text" placeholder="สาขา" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
            หมายเลขโทรศัพท์
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                    <input name="re_tel[]" id="re_tel_<?=$time?>" type="text" placeholder="หมายเลขโทรศัพท์" maxlength="10" class="form-control" required onkeyup="return check_tel(<?=$time?>)" onblur="return t_tel(<?=$time?>)"> 
                    <span id="tel_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                    <div class="col-md-4"><input name="re_email[]" type="email" placeholder="อีเมล์" class="form-control"></div>
                </div>
            </div>
        </div> 
        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
        Country Name
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                    <!-- Country names and Country Name -->
<select class="form-control" id="re_country_<?=$time?>" name="re_country[]" required>
    <option value=""></option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Aland Islands">Aland Islands</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote D'Ivoire">Cote D'Ivoire</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Curacao">Curacao</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guernsey">Guernsey</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Isle of Man">Isle of Man</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jersey">Jersey</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
    <option value="Korea, Republic of">Korea, Republic of</option>
    <option value="Kosovo">Kosovo</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
    <option value="Moldova, Republic of">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Barthelemy">Saint Barthelemy</option>
    <option value="Saint Helena">Saint Helena</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Martin">Saint Martin</option>
    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Sint Maarten">Sint Maarten</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
    <option value="South Sudan">South Sudan</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Viet Nam</option>
    <option value="Virgin Islands, British">Virgin Islands, British</option>
    <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
    <option value="Wallis and Futuna">Wallis and Futuna</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>
                    <span id="tel_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                   
                </div>
            </div>
        </div>   
        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
            Date check in :
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                    <input name="re_check_in[]" id="re_check_in_<?=$time?>" type="date" placeholder="Date check in" class="form-control" required onkeyup="return check_tel(<?=$time?>)" onblur="return t_tel(<?=$time?>)"> 
                    <span id="tel_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                    <div class="col-md-4"><input name="re_wechat[]" id="re_re_wechat_<?=$time?>" type="text" placeholder="WeChat ID" class="form-control"></div>
                </div>
            </div>
        </div>  

    </div>
</div>

        <!--
        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-2 control-label">
            <span id="btn_add_form"></span>
        </label>
            <div class="col-sm-10">
                <a href="#" onclick="return add_form_register()">
                    <i class="fa fa-plus"></i>
                    คลิก เพิ่มผู้ร่วมห้อง (กรณีมีมากกว่า 1 คน)
                </a> 
            </div>
        </div>
        -->

        <div class="hr-line-dashed"></div>

        <div class="form-group">
        <label class="col-sm-3 control-label">
        </label>
            <div class="col-sm-9" style="color:red">
                *** กรุณาตรวจสอบหอพักก่อน ว่ามีเตียงว่างที่จะรองรับสำหรับการเข้าพักหรือไม่?
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
        	ประเภทหอพัก
        	<span style="color:red">*</span>
        </label>
        	<div class="col-md-6">
        		<select name="d_id" id="d_id" class="form-control" onchange="return chk_register_class_dorm(this)" required>
        			<option value="">--เลือกประเภทหอพัก--</option>
        			<?php foreach($dorm as $value): ?>

        			<?php

        			$q = $this->db->where('d_id',$value->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs1 = $q->result();
                    $number_bed = $qs1[0]->c_bed;
                    // $q = $this->db
                    // ->join('tbl_dorm', 'tbl_class_dorm.d_id = tbl_dorm.d_id')
                    // ->where('tbl_dorm.rooms_type', '2')
                    // ->where('tbl_class_dorm.d_id', $value->d_id)
                    // ->get('tbl_class_dorm');
                   
                    
                    // $qs1 = $q->result();
                    // $number_bed = $qs1[0]->c_bed;

                    // $q = $this->db->where('tbl_class_dorm.d_id', $val->d_id)
                    // ->join('tbl_dorm', 'tbl_dorm.d_id = tbl_class_dorm.d_id')
                    // ->where('tbl_dorm.rooms_type', 2)
                    // ->select_sum('tbl_class_dorm.c_bed')
                    // ->get('tbl_class_dorm');
                    // $qs2 = $q->result();
                    // $number_bed = $qs2[0]->c_bed;
                    
                    $q2 = $this->db->where('d_id',$value->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();
                    // $q2 = $this->db
                    // ->join('tbl_dorm', 'tbl_register_dorm.d_id = tbl_dorm.d_id')
                    // ->where('tbl_dorm.rooms_type', 2)
                    // ->where('tbl_register_dorm.d_id', $value->d_id)
                    // ->get('tbl_register_dorm');
                    // $row2_ = $q2->num_rows();
                    $remain = $number_bed - $row2_;
                    if($remain > 0){
                        $msg_ = '';
                    }else{
                        $msg_ = '(เตียงไม่ว่าง)';
                    }
        			?>
                    
        			<option value="<?=$value->d_id;?>"> <?=$value->d_id;?> 
        				<?=$value->d_name?> <?=$value->$d_id;?>
        				ประเภท <?=$value->d_number_bed?> เตียง
        				<?=$value->d_type?>
        				<?=number_format($value->d_price)?>
        				<?=$value->d_location?>
        				(<?=$value->d_position?>) ว่าง <?=$remain?> เตียง
                        <?=$msg_?>
        			</option>

        			<?php endforeach; ?>
        		</select>
                <div id="msg_data"></div>
        	</div>	
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <a href="#" onclick="save_register(<?=$time?>)" class="btn btn-success">
                	<i class="fa fa-ok"></i>
                	ตกลง
                </a>
                <button type="reset" class="btn btn-danger">
                	<i class="fa fa-cancel"></i>
                	ยกเลิก
                </button>
            </div>
        </div>

        </form>
    </div>
</div>


<script>


    function check_code(time){
        var re_code = $(".re_code_"+time);
        if(isNaN(re_code.val())){
            re_code.val("");
        }
    }

    function b_code(time){
        var re_code = $(".re_code_"+time);
        var code_error = $("#code_error_"+time);
        if(re_code.val().length < 11){
            re_code.css({
                "border" : "2px solid red"
            });
            code_error.html("รหัสนิสิตต้อง 11 หลักเท่านั้น");
        }else{
            re_code.css({
                "border" : "1px solid #ccc"
            }); 
            code_error.html("");
        }
    } 

    function check_tel(time){

        var re_tel = $("#re_tel_"+time);
        if(isNaN(re_tel.val())){
            re_tel.val("");
        }

    }

    function t_tel(time){
        var re_tel = $("#re_tel_"+time);
        var tel_error = $("#tel_error_"+time);
        if(re_tel.val().length < 10){
            re_tel.css({
                "border" : "2px solid red"
            });
            tel_error.html("เบอร์โทรศัพท์ 10 หลักเท่านั้น");
        }else{
            re_tel.css({
                "border" : "1px solid #ccc"
            }); 
            tel_error.html("");
        }
    }

	

	function add_form_register(){
		get_form_register();
		return false;
	}	

	function remove_form(time){
		$("#panel_"+time).remove();
		return false;
	}

	function get_form_register(){

		$("#btn_add_form").html("<div class='sk-spinner sk-spinner-three-bounce'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");

		$.ajax({
			url: 'index.php/ajax/form_register',
			type: 'POST',
			data: $("#frm_register").serialize()
		})
		.done(function(data){
			$("#btn_add_form").hide();
			$("#result").append(data);
		});
	}



	function save_register(time){

		var re_fname = $("#re_fname_"+time).val();
		var re_lname = $("#re_lname_"+time).val();
		var re_code = $("#re_code_"+time).val();
		var re_level_class = $("#re_level_class_"+time).val();
        var re_passport = $("#re_passport_"+time).val();
        var re_visa_id = $("#re_visa_id_"+time).val();
        var re_check_in = $("#re_check_in_"+time).val();
		var fac_id = $("#fac_id_"+time).val();
		var re_subject = $("#re_subject_"+time).val();
		var re_tel = $("#re_tel_"+time).val();
        var re_country = $("#re_country_"+time).val();
        var re_wechat = $("#re_wechat"+time).val();
		var d_id = $("#d_id").val();
        //alert(re_country);
        if(re_passport == ''){
			$("#re_passport_"+time).focus();
			$("#re_passport_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_visa_id == ''){
			$("#re_visa_id_"+time).focus();
			$("#re_visa_id_"+time).css({
				"border" : "2px solid red"
			});	
		}
		else if(re_fname == ''){
			$("#re_fname_"+time).focus();
			$("#re_fname_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_lname == ''){
			$("#re_lname_"+time).focus();
			$("#re_lname_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_code == ''){
			$("#re_code_"+time).focus();
			$("#re_code_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_level_class == ''){
			$("#re_level_class_"+time).focus();
			$("#re_level_class_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(fac_id == ''){
			$("#fac_id_"+time).focus();
			$("#fac_id_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_subject == ''){
			$("#re_subject_"+time).focus();
			$("#re_subject_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(re_tel == ''){
			$("#re_tel_"+time).focus();
			$("#re_tel_"+time).css({
				"border" : "2px solid red"
			});	
		}else if(d_id == ''){
			$("#d_id").focus();
			$("#d_id").css({
				"border" : "2px solid red"
			});	
		}else{

            var x_code = $(".data_code").val();
            if(x_code.length != 11){
                $(".data_code").focus();
                return false;
            }else{

                var txt = "<?php echo $alert; ?>";
    			swal({
                    html:true,
                    title: "แจ้งเตือน!",
                    text: txt,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ยืนยันการสมัคร",
                    closeOnConfirm: false
                }, function () {
                    $(".sweet-alert").hide();
                    $(".sweet-overlay").css({
                    	"opacity" : "none",
                    	"overflow" : "scroll",
                    	"display" : "none"
                    });
                    $("#body").removeClass("stop-scrolling");
                    $.ajax({
    					url: 'save_register',
    					type: 'POST',
    					data: $("#frm_register").serialize(),
    					beforeSend: function(){
    		                $("#result-register").html("<div class='sk-spinner sk-spinner-three-bounce' style='margin-top:50px;margin-bottom: 20px;'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");
    		            },
    		            success: function(data){
    		            	$("#result-register").html(data);
    		            }
    				});	
                });

            }

			
		}
	}

    function chk_register_class_dorm(selection){
        $.ajax({
            url: 'index.php/ajax/chk_register_class_dorm',
            data: {d_id:selection.value},
            type: 'POST',
            success: function(data){
                $("#msg_data").html(data);
            }
        });
    }
</script>