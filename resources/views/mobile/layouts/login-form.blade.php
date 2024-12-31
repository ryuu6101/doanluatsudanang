<div id="guestBlock_nv5" class="hidden">
        <div class="guestBlock">
            <h3><a href="javascript:void(0)" onclick="switchTab(this);tipAutoClose(true);" class="guest-sign pointer margin-right current" data-switch=".log-area, .reg-area" data-obj=".guestBlock">Đăng nhập</a> <a href="javascript:void(0)" onclick="switchTab(this);tipAutoClose(false);" class="guest-reg pointer" data-switch=".reg-area, .log-area" data-obj=".guestBlock">Đăng ký</a> </h3>
            <div class="log-area">
                <form action="/users/login/" method="post" onsubmit="return login_validForm(this);" autocomplete="off" novalidate="">
        <div class="nv-info margin-bottom" data-default="Hãy đăng nhập thành viên để trải nghiệm đầy đủ các tiện ích trên site">Hãy đăng nhập thành viên để trải nghiệm đầy đủ các tiện ích trên site</div>
        <div class="form-detail">
            <div class="form-group loginstep1">
                <div class="input-group">
                    <span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
                    <input type="text" class="required form-control" placeholder="Tên đăng nhập hoặc email" value="" name="nv_login" maxlength="100" data-pattern="/^(.){1,}$/" onkeypress="validErrorHidden(this);" data-mess="Tên đăng nhập chưa được khai báo">
                </div>
            </div>
    
            <div class="form-group loginstep1">
                <div class="input-group">
                    <span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
                    <input type="password" autocomplete="off" class="required form-control" placeholder="Mật khẩu" value="" name="nv_password" maxlength="100" data-pattern="/^(.){3,}$/" onkeypress="validErrorHidden(this);" data-mess="Mật khẩu đăng nhập chưa được khai báo">
                </div>
            </div>
    
            <div class="form-group loginstep2 hidden">
                <label class="margin-bottom">Nhập mã do ứng dụng xác thực cung cấp</label>
                <div class="input-group margin-bottom">
                    <span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
                    <input type="text" class="required form-control" placeholder="Nhập mã 6 chữ số" value="" name="nv_totppin" maxlength="6" data-pattern="/^(.){6,}$/" onkeypress="validErrorHidden(this);" data-mess="Nhập mã 6 chữ số">
                </div>
                <div class="text-center">
                    <a href="javascript:void(0);" onclick="login2step_change(this);">Thử cách khác</a>
                </div>
            </div>
    
            <div class="form-group loginstep3 hidden">
                <label class="margin-bottom">Nhập một trong các mã dự phòng bạn đã nhận được.</label>
                <div class="input-group margin-bottom">
                    <span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
                    <input type="text" class="required form-control" placeholder="Nhập mã 8 chữ số" value="" name="nv_backupcodepin" maxlength="8" data-pattern="/^(.){8,}$/" onkeypress="validErrorHidden(this);" data-mess="Nhập mã 8 chữ số">
                </div>
                <div class="text-center">
                    <a href="javascript:void(0);" onclick="login2step_change(this);">Thử cách khác</a>
                </div>
            </div>
            <div class="text-center margin-bottom-lg">
                <input type="button" value="Thiết lập lại" class="btn btn-default" onclick="validReset(this.form);return!1;">
                <button class="bsubmit btn btn-primary" type="submit">Đăng nhập</button>
               </div>
        </div>
    </form>
    
                <div class="text-center margin-top-lg" id="other_form">
                    <a href="/users/lostpass/">Quên mật khẩu?</a>
                </div>
            </div>
                    <div class="reg-area hidden">
                <form class="user-reg-form" action="/users/register/" method="post" onsubmit="return reg_validForm(this);" autocomplete="off" novalidate="">
        <div class="nv-info margin-bottom" data-default="Để đăng ký thành viên, bạn cần khai báo tất cả các ô trống dưới đây">Để đăng ký thành viên, bạn cần khai báo tất cả các ô trống dưới đây</div>
    
        <div class="form-detail">
                            <div class="form-group">
                <div>
                    <input type="text" class="form-control  input" placeholder="Họ và tên đệm" value="" name="last_name" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="">
                </div>
            </div>
                    <div class="form-group">
                <div>
                    <input type="text" class="form-control required input" placeholder="Tên" value="" name="first_name" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input type="text" class="required form-control" placeholder="Tên đăng nhập" value="" name="username" maxlength="20" data-pattern="/^(.){4,20}$/" onkeypress="validErrorHidden(this);" data-mess="Tên đăng nhập không hợp lệ: Tên đăng nhập chỉ được sử dụng Unicode, không có các ký tự đặc biệt và có từ 4 đến 20 ký tự">
                </div>
            </div>
    
            <div class="form-group">
                <div>
                    <input type="email" class="required form-control" placeholder="Email" value="" name="email" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="Email chưa được khai báo">
                </div>
            </div>
    
            <div class="form-group">
                <div>
                    <input type="password" autocomplete="off" class="password required form-control" placeholder="Mật khẩu" value="" name="password" maxlength="32" data-pattern="/^(.){8,32}$/" onkeypress="validErrorHidden(this);" data-mess="Mật khẩu không hợp lệ: Mật khẩu cần kết hợp số và chữ, yêu cầu có chữ in HOA và có từ 8 đến 32 ký tự">
                </div>
            </div>
    
            <div class="form-group">
                <div>
                    <input type="password" autocomplete="off" class="re-password required form-control" placeholder="Lặp lại mật khẩu" value="" name="re_password" maxlength="32" data-pattern="/^(.){8,32}$/" onkeypress="validErrorHidden(this);" data-mess="Bạn chưa viết lại mật khẩu vào ô nhập lại mật khẩu">
                </div>
            </div>
    
                    <div>
                <div>
                    <div class="form-group clearfix radio-box  input" data-mess="">
                        <label class="col-sm-8 control-label  input" title=""> Giới tính </label>
                        <div class="btn-group col-sm-16">
                                                    <label class="radio-box"> <input type="radio" name="gender" value="N" class="input" onclick="validErrorHidden(this,5);"> N/A </label>
                            <label class="radio-box"> <input type="radio" name="gender" value="M" class="input" onclick="validErrorHidden(this,5);" checked="checked"> Nam </label>
                            <label class="radio-box"> <input type="radio" name="gender" value="F" class="input" onclick="validErrorHidden(this,5);"> Nữ </label>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control datepicker required input" data-provide="datepicker" placeholder="Ngày tháng năm sinh" value="" name="birthday" readonly="readonly" onchange="validErrorHidden(this);" onfocus="datepickerShow(this);" data-mess="">
                    <span class="input-group-addon pointer" onclick="button_datepickerShow(this);"> <em class="fa fa-calendar"></em> </span>
                </div>
            </div>
                    <div class="form-group">
                <div>
                    <textarea class="form-control  input" placeholder="Chữ ký" name="sig" onkeypress="validErrorHidden(this);" data-mess=""></textarea>
                </div>
            </div>
                    <div class="form-group rel">
                <div class="input-group">
                    <input type="text" class="form-control required input" placeholder="Câu hỏi bảo mật" value="" name="question" maxlength="255" data-pattern="/^(.){3,}$/" onkeypress="validErrorHidden(this);" data-mess="Bạn chưa khai báo câu hỏi bảo mật">
                    <span class="input-group-addon pointer" title="Hãy lựa chọn câu hỏi" onclick="showQlist(this);"><em class="fa fa-caret-down fa-lg"></em></span>
                </div>
                <div class="qlist" data-show="no">
                    <ul>
                                            <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Bạn thích môn thể thao nào nhất</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Món ăn mà bạn yêu thích</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Thần tượng điện ảnh của bạn</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Bạn thích nhạc sỹ nào nhất</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Quê ngoại của bạn ở đâu</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Tên cuốn sách "gối đầu giường"</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="addQuestion(this);">Ngày lễ mà bạn luôn mong đợi</a>
                        </li>
                    </ul>
                </div>
            </div>
                    <div class="form-group">
                <div>
                    <input type="text" class="form-control required input" placeholder="Trả lời câu hỏi" value="" name="answer" maxlength="255" data-pattern="/^(.){3,}$/" onkeypress="validErrorHidden(this);" data-mess="Bạn chưa nhập câu Trả lời của câu hỏi">
                </div>
            </div>
                    <div>
                <div>
                    <div class="form-group text-center check-box required" data-mess="">
                        <input type="checkbox" name="agreecheck" value="1" class="fix-box" onclick="validErrorHidden(this,3);">Tôi đồng ý với <a onclick="usageTermsShow('Quy định đăng ký thành viên');" href="javascript:void(0);"><span class="btn btn-default btn-xs">Quy định đăng ký thành viên</span></a>
                    </div>
                </div>
            </div>
                    <div class="form-group">
                <div class="middle text-center clearfix">
                    <img class="captchaImg display-inline-block" src="/index.php?scaptcha=captcha&amp;t=1735542153" width="150" height="40" alt="Mã bảo mật" title="Mã bảo mật">
                    <em class="fa fa-pointer fa-refresh margin-left margin-right" title="Thay mới" onclick="change_captcha('.rsec');"></em>
                    <input type="text" style="width:100px;" class="rsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="6" placeholder="Mã bảo mật" data-pattern="/^(.){6,6}$/" onkeypress="validErrorHidden(this);" data-mess="Mã bảo mật không chính xác">
                </div>
            </div>
            <div class="text-center margin-bottom-lg">
                <input type="hidden" name="checkss" value="b1990062c5e6440492806a9e769215b0">
                <input type="button" value="Thiết lập lại" class="btn btn-default" onclick="validReset(this.form);return!1;">
                <input type="submit" class="btn btn-primary" value="Đăng ký thành viên">
            </div>
                    <div class="text-center">
                <a href="/users/lostactivelink/">Đã đăng ký nhưng không nhận được link kích hoạt?</a>
            </div>
        </div>
    </form>
    
            </div>
        </div>
    </div>