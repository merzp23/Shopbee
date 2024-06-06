@csrf
<div class="d-flex info-box rounded p-3 ">
    <div class="w-70">
        <h4 class="mb-4">Infomation</h4>
        <div class="d-flex align-items-center">
            <div class="col-2 mb-3 me-3">
                <img id="avatarPreview"
                    src="{{ !empty($user->AVATAR) ? Storage::url($user->AVATAR) : 'https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745' }}"
                    alt="avatar" class="img-thumbnail avatar mb-3">
                <input class="form-control" type="file" id="avatarUpload" accept="image/*" name="avatar">
            </div>

            <div class="col-8 ">
                <div class="mb-3 row">
                    <label for="username" class="col-4 col-form-label">Họ và tên</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="username" name="fullName"
                            value="{{ $user->LAST_NAME . ' ' . $user->FIRST_NAME }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-4 col-form-label">Password</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user->USERNAME }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .birthday-select {
                width: auto;
                display: inline-block;
                margin-right: 0.5rem;
                margin-bottom: 0.5rem;
            }
            .form-label {
                margin-bottom: 0.5rem;
            }
        </style>
        
        <div class="mb-3 row align-items-center">
            <label for="birthday" class="col-2 col-form-label">Birthday</label>
            <div class="col">
                <select id="day" class="form-select birthday-select" onchange="updateBirthday()">
                    <option value="">Date</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select id="month" class="form-select birthday-select" onchange="updateBirthday()">
                    <option value="">Month</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select id="year" class="form-select birthday-select" onchange="updateBirthday()">
                    <option value="">Year</option>
                    @for ($i = 1900; $i <= date('Y'); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" name="BIRTHDAY" id="birthday">
            <x-input-error :messages="$errors->get('BIRTHDAY')" class="mt-2" />
        </div>
        
        <script>
            function updateBirthday() {
                var day = document.getElementById('day').value;
                var month = document.getElementById('month').value;
                var year = document.getElementById('year').value;
                
                if (day && month && year) {
                    document.getElementById('birthday').value = year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day : day);
                } else {
                    document.getElementById('birthday').value = '';
                }
            }
        </script>
        <div class="mb-3 row">
            <label for="gender" class="col-2 col-form-label">Gender</label>
            <div class="form-check col-2">
                <input class="form-check-input" {{ isset($user->GENDER) && $user->GENDER == 'male' ? 'checked' : '' }} type="radio" id="male" name="GENDER" value="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check col-2">
                <input class="form-check-input" {{ isset($user->GENDER) && $user->GENDER == 'female' ? 'checked' : '' }} type="radio" id="female" name="GENDER" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <div class="form-check col-2">
                <input class="form-check-input" {{ isset($user->GENDER) && $user->GENDER == 'other' ? 'checked' : '' }} type="radio" id="other" name="GENDER" value="other">
                <label class="form-check-label" for="other">
                    Other
                </label>
            </div>
            <div class="text-center d-flex justify-content-center">
                <x-input-error :messages="$errors->get('GENDER')" class="mt-2" />
            </div>
        </div>

        <style>
            .styled-input {
                border: 1.5px solid #6c757d;
                border-radius: 7px;
                padding: 7px;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            .styled-input:focus {
                border-color: #5b9bd5;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(91, 155, 213, 0.6);
                outline: none;
            }

            .btn-purple {
                background-color: #6f42c1;
                border: none;
                color: white;
            }

            .btn-purple:hover {
                background-color: #5a34a7;
            }
        </style>

        <div class="mb-3 row">
            <label for="province" class="col-2 col-form-label">Province</label>
            <div class="col-8">
                <input class="form-control styled-input" type="text" name="PROVINCE" id="province" value="{{ isset($user->PROVINCE) ? $user->PROVINCE : '' }}">
                <x-input-error :messages="$errors->get('PROVINCE')" class="mt-2" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="city" class="col-2 col-form-label">City</label>
            <div class="col-8">
                <input class="form-control styled-input" type="text" name="CITY" id="city" value="{{ isset($user->CITY) ? $user->CITY : '' }}">
                <x-input-error :messages="$errors->get('CITY')" class="mt-2" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-2 col-form-label">Address</label>
            <div class="col-8">
                <input class="form-control styled-input" type="text" name="ADDRESS" id="address" value="{{ isset($user->ADDRESS) ? $user->ADDRESS : '' }}">
                <x-input-error :messages="$errors->get('ADDRESS')" class="mt-2" />
            </div>
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-purple fw-bold">Save changes</button>
        </div>
        
    </div>
    <div class="w-30">
        <h4 class="mb-4">Phonenumber & Email</h4>
        <!-- Error message section -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('succes'))
            <div class="alert alert-success">
                {{ session('succes') }}
            </div>
        @endif
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <i class="fa-solid fa-phone-volume fs-3"></i>
                </div>
                <div class="pe-3">
                    <span class="">Phone number</span><br>
                    <span>{{ !empty($user->PHONE_NUMBER) ? $user->PHONE_NUMBER : 'example@mail.com' }}</span>
                </div>
            </div>
            <div class="">
                <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                    data-bs-target="#modalphone">
                    Update
                </button>
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <i class="fa-regular fa-envelope fs-3"></i>
                </div>
                <div class="pe-3">
                    <span class="">Mail address</span><br>
                    <span>{{ !empty($user->EMAIL) ? $user->EMAIL : 'example@mail.com' }}</span>
                </div>
            </div>
            <div class="">
                <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                    data-bs-target="#modalemail">
                    Update
                </button>
            </div>
        </div>
        <h4 class="mb-4">Security</h4>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <i class="fa-solid fa-phone-volume fs-3"></i>
                </div>
                <div class="pe-3">
                    <span class=" ">Set up password</span><br>
                </div>
            </div>
            <div class="">
                <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                    data-bs-target="#modalpass">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>