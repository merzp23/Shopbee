@extends('layout.layout')
@section('content')
    <div class="w-70">
        <h3 class="p-3">Account Infomation</h3>
        @php
            $profileFormUniqId = 'profile_form_uniq_id_' . uniqId();
        @endphp
        <form form-uniq="{{ $profileFormUniqId }}" action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST" enctype="multipart/form-data">
            @include('pages._infor_form')
        </form>
    </div>
    {{-- Modal update email --}}
    <div class="modal" tabindex="-1" id="modalemail" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ $user->EMAIL }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-action="submit-btn" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal update phone --}}
    <div class="modal" tabindex="-1" id="modalphone" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Phone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                            value="{{ $user->PHONE_NUMBER }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal update pass --}}
    <div class="modal" tabindex="-1" id="modalpass" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update_pass/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pass</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" name="old_pass" class="form-control" placeholder="Old pass">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="new_pass" class="form-control" placeholder="New pass">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="cf_new_pass" class="form-control" placeholder="Config New pass">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(() => {
            new ProfileForm({
                self: () => {
                    return $('[form-uniq="{{ $profileFormUniqId }}"]')
                }
            });
        })

        var ProfileForm = class {
            constructor(options) {
                this.self = options.self;
                this.events()
            }

            getSubmitBtn() {
                return this.self().find('[data-action="submit-btn"]');
            }

            getUrl() {
                return this.self().attr('action');
            }

            submit() {
                const url = this.getUrl();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: this.self().serialize()
                }).done(res => {
                    location.reload();
                }).fail(res => {
                    this.self().html(res.responseText);
                })
            }

            events() {
                const _this = this;

                _this.self().on('submit', e => {
                    e.preventDefault();

                    _this.submit();
                })
            }
        }
    </script>
@stop
