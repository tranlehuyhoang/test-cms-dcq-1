@extends('layouts.app')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('messages.task_detail') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dcq') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('task.index') }}">{{ __('messages.tasks') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('messages.task_detail') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='mdi mdi-dots-horizontal font-18'></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="{{ route('task.add', $task[0]['id']) }}" class="dropdown-item">
                                        <i class="fe-plus me-1"></i></i>Add child task
                                    </a>
                                    <!-- item-->
                                    <a href="{{ route('task.edit', $task[0]['id']) }}" class="dropdown-item">
                                        <i class='mdi mdi-pencil-outline me-1'></i>Edit
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-content-copy me-1'></i>Mark as Duplicate
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item text-danger">
                                        <i class='mdi mdi-delete-outline me-1'></i>Delete
                                    </a>
                                </div>
                            </div>
                            <h4 class="mb-1"><?php echo $task[0]['name']; ?></h4>

                            <div class="text-muted">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-start mt-3">
                                            <div class="me-2 align-self-center">
                                                <img src="/assets/images/users/avatar-2.jpg" alt=""
                                                    class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="mb-1">Assign to</p>
                                                <h5 class="mt-0 text-truncate">
                                                    <?php echo $task[0]['tasks_assign_to']['name']; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-start mt-3">
                                            <div class="me-2 align-self-center">
                                                <i class="ri-calendar-event-line h2 m-0 text-muted"></i>
                                            </div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="mb-1">Due Date</p>
                                                <h5 class="mt-0 text-truncate">
                                                    <?php echo \Illuminate\Support\Carbon::parse($task[0]['due_date'])->format('d/m/Y H:i'); ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5>{{ __('messages.task_description') }}</h5>
                                <div class="border rounded-1 p-2 overflow-auto">
                                    <?php echo $task[0]['description']; ?>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <h5>{{ __('messages.task_task_value') }}</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">{{ __('messages.task_hour') }}</span>
                                            <input type="number" step="0.125" class="form-control"
                                                value="<?php echo $task[0]['task_value']; ?>" name="task[task_value]" readonly>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <h5>{{ __('messages.task_status') }}</h5>
                                        <span class="btn btn-secondary waves-effect"><?php echo $arStatus[$task[0]['status']]; ?></span>
                                    </div>

                                    <div class="col-4">
                                        <h5>{{ __('messages.task_priority') }}</h5>
                                        <span class="btn btn-secondary waves-effect"><?php echo $arPriority[$task[0]['priority']]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='mdi mdi-dots-horizontal font-18'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-attachment me-1'></i>Attachment
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-pencil-outline me-1'></i>Edit
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-content-copy me-1'></i>Mark as Duplicate
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item text-danger">
                                        <i class='mdi mdi-delete-outline me-1'></i>Delete
                                    </a>
                                </div> <!-- end dropdown menu-->
                            </div> <!-- end dropdown-->
                            <h5 class="header-title mb-3">Attachments</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <form action="/" method="post" class="dropzone" id="myAwesomeDropzone"
                                            data-plugin="dropzone" data-previews-container="#file-previews"
                                            data-upload-preview-template="#uploadPreviewTemplate">
                                            <div class="fallback">
                                                <input name="file" type="file" />
                                            </div>

                                            <div class="dz-message needsclick">
                                                <i class="h2 text-muted ri-upload-2-line d-inline-block"></i>
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mt-4 mt-md-0">
                                        <div class="card border mb-2">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span
                                                                class="avatar-title badge-soft-primary text-primary rounded">
                                                                ZIP
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);"
                                                            class="text-muted fw-semibold">Minton-sketch-design.zip</a>
                                                        <p class="mb-0 font-12">2.3 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-link font-16 text-muted">
                                                            <i class="ri-download-2-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border mb-0">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-secondary rounded text-light">
                                                                .MP4
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);"
                                                            class="text-muted fw-semibold">Admin-bug-report.mp4</a>
                                                        <p class="mb-0 font-12">7.05 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-link font-16 text-muted">
                                                            <i class="ri-download-2-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Preview -->
                                        <div class="dropzone-previews mt-2" id="file-previews"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (count($arChildTasks) > 0) {
                        ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-3">Child tasks</h5>

                            <div class="table-responsive mt-3">
                                <table class="table table-centered table-nowrap table-borderless table-sm">
                                    <thead class="table-light">
                                        <tr class="">

                                            <th scope="col">Tasks</th>
                                            <th scope="col">Assign to</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">Task priority</th>
                                            <th scope="col" style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($arChildTasks as $key => $value) {

                                                if ($value['priority'] == 'hight') {
                                                    $priority = 'badge-soft-danger';
                                                } elseif ($value['priority'] == 'medium') {
                                                    $priority = 'badge-soft-info';
                                                } else {
                                                    $priority = 'badge-soft-success';
                                                }

                                                ?>
                                        <tr>

                                            <td>
                                                <a href="{{ route('task.detail', $value['id']) }}"><?php echo $value['name']; ?></a>
                                            </td>
                                            <td>
                                                <div>

                                                    <a
                                                        href="{{ route('user.detail', $value['tasks_assign_to']['id']) }}"><?php echo $value['tasks_assign_to']['name']; ?></a>
                                                </div>
                                            </td>
                                            <td><?php echo \Illuminate\Support\Carbon::parse($value['due_date'])->format('d/m/Y H:i'); ?></td>
                                            <td><span class="badge <?php echo $priority; ?> p-1"><?php echo $value['priority']; ?></span>
                                            </td>
                                            <td>
                                                <ul class="list-inline table-action m-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon px-1"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <a class="action-icon px-1 dropdown-toggle" href="#"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else
                                                                    here</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="float-end">
                                <select class="form-select form-select-sm">
                                    <option selected="">Recent</option>
                                    <option value="1">Most Helpful</option>
                                    <option value="2">High to Low</option>
                                    <option value="3">Low to High</option>
                                </select>
                            </div> <!-- end dropdown-->

                            <h4 class="mb-4 mt-0 font-16">Comments ({{ $commentCount }})</h4>

                            <div class="clerfix"></div>




                            @foreach ($taskComments as $taskComment)
                                <div class="d-flex align-items-start mt-3">
                                    <img class="me-2 rounded-circle" src="/assets/images/users/avatar-5.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="flex-1">
                                        <h5 class="mt-0">{{ $taskComment->user->name }}
                                            @if ($taskComment->user->id == $user_id)
                                                <span style="color: red">(you)</span>
                                            @endif
                                            <small
                                                class="text-muted fw-normal float-end">{{ $taskComment->created_at->diffForHumans() }}</small>
                                        </h5>
                                        {{ $taskComment->content }}

                                        <br />
                                        <a href="javascript:void(0);" class="text-muted font-13 d-inline-block mt-2"
                                            onclick="setReplyId({{ $taskComment->id }}, '{{ $taskComment->user->name }}');">
                                            <i class="mdi mdi-reply"></i> Reply
                                        </a>
                                        <a href="javascript:void(0);" class="text-muted font-13 d-inline-block mt-2">
                                            <i
                                                class="mdi  mdi-arrow-down
                                            "></i>
                                            Xem 1 phản hồi
                                        </a>
                                        @foreach ($taskCommentsWithReplys as $taskCommentWithReply)
                                            @if ($taskCommentWithReply->reply_id == $taskComment->id)
                                                <div class="d-flex align-items-start mt-3">
                                                    <a class="pe-2" href="#">
                                                        <img src="/assets/images/users/avatar-5.jpg"
                                                            class="rounded-circle" alt="Generic placeholder image"
                                                            height="32">
                                                    </a>
                                                    <div class="flex-1">
                                                        <h5 class="mt-0">{{ $taskCommentWithReply->user->name }}
                                                            @if ($taskCommentWithReply->user->id == $user_id)
                                                                <span style="color: red">(you)</span>
                                                            @endif
                                                            <small
                                                                class="text-muted fw-normal float-end">{{ $taskCommentWithReply->created_at->diffForHumans() }}</small>
                                                        </h5>
                                                        {{ $taskCommentWithReply->content }}

                                                        <br />
                                                        <a href="javascript:void(0);"
                                                            class="text-muted font-13 d-inline-block mt-2"
                                                            onclick="setReplyId({{ $taskCommentWithReply->id }}, '{{ $taskCommentWithReply->user->name }}');">
                                                            <i class="mdi mdi-reply"></i> Reply
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="text-muted font-13 d-inline-block mt-2">
                                                            <i
                                                                class="mdi  mdi-arrow-down
                                                            "></i>
                                                            Xem 1 phản hồi
                                                        </a>
                                                        @foreach ($taskCommentsWithReplys as $taskCommentWithReply2)
                                                            @if ($taskCommentWithReply2->reply_id == $taskCommentWithReply->id)
                                                                <div class="d-flex align-items-start mt-3">
                                                                    <a class="pe-2" href="#">
                                                                        <img src="/assets/images/users/avatar-5.jpg"
                                                                            class="rounded-circle"
                                                                            alt="Generic placeholder image"
                                                                            height="32">
                                                                    </a>
                                                                    <div class="flex-1">
                                                                        <h5 class="mt-0">
                                                                            {{ $taskCommentWithReply2->user->name }}
                                                                            @if ($taskCommentWithReply2->user->id == $user_id)
                                                                                <span style="color: red">(you)</span>
                                                                            @endif
                                                                            <small
                                                                                class="text-muted fw-normal float-end">{{ $taskCommentWithReply2->created_at->diffForHumans() }}</small>
                                                                        </h5>
                                                                        {{ $taskCommentWithReply2->content }}
                                                                        <br />

                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center mt-2">
                                <a href="javascript:void(0);" class="text-danger"><i
                                        class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                            </div>

                            <style>
                                #boldText {
                                    font-weight: bold;
                                }
                            </style>
                            <div class="border rounded mt-4">
                                <span id="boldText"></span>
                                <form action="{{ route('taskcomment.create') }}" class="comment-area-box"
                                    method="POST">
                                    @csrf
                                    <input type="number" hidden name="task_id" value="{{ $task_id }}">
                                    <input type="number" hidden name="reply_id" value="0" id="reply_id">

                                    <textarea name="content" id="comment_content" rows="3" class="form-control border-0 resize-none"
                                        placeholder="Your comment..."></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#" class="btn btn-sm px-1 btn-light"><i
                                                    class='mdi mdi-upload'></i></a>
                                            <a href="#" class="btn btn-sm px-1 btn-light"><i
                                                    class='mdi mdi-at'></i></a>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                class="fe-send me-1"></i>Submit</button>
                                    </div>
                                </form>

                                <script>
                                    function setReplyId(userId, userName) {
                                        console.log('userId', userId);
                                        document.getElementById('reply_id').value = userId;
                                        var boldText = document.getElementById('boldText');
                                        document.getElementById('comment_content').value = '@' + userName + ' : ';
                                    }
                                </script>
                            </div> <!-- end .border-->

                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
            </div>
            <!-- end row -->

            <!-- file preview template -->
            <div class="d-none" id="uploadPreviewTemplate">
                <div class="card mb-2 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                            </div>
                            <div class="col ps-0">
                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                <p class="mb-0" data-dz-size></p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                    <i class="fe-x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Minton theme by <a href="">Coderthemes</a>
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
    <!-- end Footer -->
@endsection
