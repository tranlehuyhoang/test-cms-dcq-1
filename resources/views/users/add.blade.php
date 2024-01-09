@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ __('messages.user_add_new') }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="">{{ __('messages.dcq') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('messages.user_member_list') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('messages.user_add_new') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form method="post" id="task_form" accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('user.update') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user[id]" value="0">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">{{ __('messages.user_name') }}</label>
                                    <input type="" class="form-control" name="user[name]">
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">{{ __('messages.user_email') }}</label>
                                    <input type="email" class="form-control" aria-describedby="emailHelp" name="user[email]">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">{{ __('messages.user_password') }}</label>
                                    <input type="password" class="form-control" name="user[password]">
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">{{ __('messages.user_re_password') }}</label>
                                    <input type="password" class="form-control" name="user[re_password]">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">{{ __('messages.user_role') }}</label>
                                    <select class="form-control" name="user[role_id]">
                                        <?php
                                        foreach ($arRole as $id => $name) {
                                            ?>
                                            <option value="<?php echo $id?>"><?php echo $name?></option>
                                            <?php
                                        };
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-secondary waves-effect ms-2" href="{{ route('user.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; Minton theme by <a href="">Coderthemes</a> 
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection