@extends('Components.layout')

@section('title', 'Edit Profile')
@section('dashboard_bar')
    Edit Profile
@endsection

@section('content')

    <div class="row justify-content-center h-100 align-items-center">  
        <div class="col-xl-12">
            <div class="card card-bx m-b30">
                <div class="card-header" style="padding-left:100px;">
                    <h4 class="card-title">Update Account</h4>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" style="margin-left: 60px; margin-right: 60px;">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="profile-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row" style="padding-left:60px;">
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $admin->first_name) }}" placeholder="Firstname" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Surname</label>
                                <input type="text" name="surname" class="form-control" value="{{ old('surname', $admin->surname) }}" placeholder="Surname" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Specialty</label>
                                <input type="text" name="specialty" class="form-control" value="{{ old('specialty', $admin->specialty) }}" placeholder="Developer" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Skills</label>
                                <input type="text" name="skills" class="form-control" value="{{ old('skills', $admin->skills) }}" placeholder="HTML, JavaScript, PHP" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="selectpicker nice-select default-select form-control wide mh-auto" required>
                                    <option value="Male" {{ old('gender', $admin->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $admin->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <div class="example">
                                    <label class="form-label">Birth</label>
                                    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $admin->birth_date) }}" required>
                                </div>    
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}" placeholder="+123456789" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" placeholder="demo@gmail.com" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Country</label>
                                <select name="country" class="selectpicker nice-select default-select form-control wide mh-auto" required>
                                <option value="Afghanistan" {{ old('country', $admin->country) == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                <option value="Albania" {{ old('country', $admin->country) == 'Albania' ? 'selected' : '' }}>Albania</option>
                                <option value="Algeria" {{ old('country', $admin->country) == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                <option value="Andorra" {{ old('country', $admin->country) == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                <option value="Angola" {{ old('country', $admin->country) == 'Angola' ? 'selected' : '' }}>Angola</option>
                                <option value="Antigua and Barbuda" {{ old('country', $admin->country) == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                <option value="Argentina" {{ old('country', $admin->country) == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                <option value="Armenia" {{ old('country', $admin->country) == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                <option value="Australia" {{ old('country', $admin->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
                                <option value="Austria" {{ old('country', $admin->country) == 'Austria' ? 'selected' : '' }}>Austria</option>
                                <option value="Azerbaijan" {{ old('country', $admin->country) == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                <option value="Bahamas" {{ old('country', $admin->country) == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                <option value="Bahrain" {{ old('country', $admin->country) == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                <option value="Bangladesh" {{ old('country', $admin->country) == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                <option value="Barbados" {{ old('country', $admin->country) == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                <option value="Belarus" {{ old('country', $admin->country) == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                <option value="Belgium" {{ old('country', $admin->country) == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                <option value="Belize" {{ old('country', $admin->country) == 'Belize' ? 'selected' : '' }}>Belize</option>
                                <option value="Benin" {{ old('country', $admin->country) == 'Benin' ? 'selected' : '' }}>Benin</option>
                                <option value="Bhutan" {{ old('country', $admin->country) == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                <option value="Bolivia" {{ old('country', $admin->country) == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                <option value="Bosnia and Herzegovina" {{ old('country', $admin->country) == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                <option value="Botswana" {{ old('country', $admin->country) == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                <option value="Brazil" {{ old('country', $admin->country) == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                <option value="Brunei" {{ old('country', $admin->country) == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                <option value="Bulgaria" {{ old('country', $admin->country) == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                <option value="Burkina Faso" {{ old('country', $admin->country) == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                                <option value="Burundi" {{ old('country', $admin->country) == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                <option value="Cabo Verde" {{ old('country', $admin->country) == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
                                <option value="Cambodia" {{ old('country', $admin->country) == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                <option value="Cameroon" {{ old('country', $admin->country) == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                <option value="Canada" {{ old('country', $admin->country) == 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="Central African Republic" {{ old('country', $admin->country) == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                                <option value="Chad" {{ old('country', $admin->country) == 'Chad' ? 'selected' : '' }}>Chad</option>
                                <option value="Chile" {{ old('country', $admin->country) == 'Chile' ? 'selected' : '' }}>Chile</option>
                                <option value="China" {{ old('country', $admin->country) == 'China' ? 'selected' : '' }}>China</option>
                                <option value="Colombia" {{ old('country', $admin->country) == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                <option value="Comoros" {{ old('country', $admin->country) == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                <option value="Congo, Democratic Republic of the" {{ old('country', $admin->country) == 'Congo, Democratic Republic of the' ? 'selected' : '' }}>Congo, Democratic Republic of the</option>
                                <option value="Congo, Republic of the" {{ old('country', $admin->country) == 'Congo, Republic of the' ? 'selected' : '' }}>Congo, Republic of the</option>
                                <option value="Costa Rica" {{ old('country', $admin->country) == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                <option value="Croatia" {{ old('country', $admin->country) == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                <option value="Cuba" {{ old('country', $admin->country) == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                <option value="Cyprus" {{ old('country', $admin->country) == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                <option value="Czech Republic" {{ old('country', $admin->country) == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                <option value="Denmark" {{ old('country', $admin->country) == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                <option value="Djibouti" {{ old('country', $admin->country) == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                <option value="Dominica" {{ old('country', $admin->country) == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                <option value="Dominican Republic" {{ old('country', $admin->country) == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                <option value="Ecuador" {{ old('country', $admin->country) == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                <option value="Egypt" {{ old('country', $admin->country) == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                <option value="El Salvador" {{ old('country', $admin->country) == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                <option value="Equatorial Guinea" {{ old('country', $admin->country) == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                <option value="Eritrea" {{ old('country', $admin->country) == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                <option value="Estonia" {{ old('country', $admin->country) == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                <option value="Eswatini" {{ old('country', $admin->country) == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
                                <option value="Ethiopia" {{ old('country', $admin->country) == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                <option value="Fiji" {{ old('country', $admin->country) == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                <option value="Finland" {{ old('country', $admin->country) == 'Finland' ? 'selected' : '' }}>Finland</option>
                                <option value="France" {{ old('country', $admin->country) == 'France' ? 'selected' : '' }}>France</option>
                                <option value="Gabon" {{ old('country', $admin->country) == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                <option value="Gambia" {{ old('country', $admin->country) == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                <option value="Georgia" {{ old('country', $admin->country) == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                <option value="Germany" {{ old('country', $admin->country) == 'Germany' ? 'selected' : '' }}>Germany</option>
                                <option value="Ghana" {{ old('country', $admin->country) == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                <option value="Greece" {{ old('country', $admin->country) == 'Greece' ? 'selected' : '' }}>Greece</option>
                                <option value="Grenada" {{ old('country', $admin->country) == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                <option value="Guatemala" {{ old('country', $admin->country) == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                <option value="Guinea" {{ old('country', $admin->country) == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                <option value="Guinea-Bissau" {{ old('country', $admin->country) == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                <option value="Guyana" {{ old('country', $admin->country) == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                <option value="Haiti" {{ old('country', $admin->country) == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                <option value="Honduras" {{ old('country', $admin->country) == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                <option value="Hungary" {{ old('country', $admin->country) == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                <option value="Iceland" {{ old('country', $admin->country) == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                <option value="India" {{ old('country', $admin->country) == 'India' ? 'selected' : '' }}>India</option>
                                <option value="Indonesia" {{ old('country', $admin->country) == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                <option value="Iran" {{ old('country', $admin->country) == 'Iran' ? 'selected' : '' }}>Iran</option>
                                <option value="Iraq" {{ old('country', $admin->country) == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                <option value="Ireland" {{ old('country', $admin->country) == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                <option value="Israel" {{ old('country', $admin->country) == 'Israel' ? 'selected' : '' }}>Israel</option>
                                <option value="Italy" {{ old('country', $admin->country) == 'Italy' ? 'selected' : '' }}>Italy</option>
                                <option value="Jamaica" {{ old('country', $admin->country) == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                <option value="Japan" {{ old('country', $admin->country) == 'Japan' ? 'selected' : '' }}>Japan</option>
                                <option value="Jordan" {{ old('country', $admin->country) == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                <option value="Kazakhstan" {{ old('country', $admin->country) == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                <option value="Kenya" {{ old('country', $admin->country) == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                <option value="Kiribati" {{ old('country', $admin->country) == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                <option value="Korea, North" {{ old('country', $admin->country) == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
                                <option value="Korea, South" {{ old('country', $admin->country) == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
                                <option value="Kosovo" {{ old('country', $admin->country) == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
                                <option value="Kuwait" {{ old('country', $admin->country) == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                <option value="Kyrgyzstan" {{ old('country', $admin->country) == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                                <option value="Laos" {{ old('country', $admin->country) == 'Laos' ? 'selected' : '' }}>Laos</option>
                                <option value="Latvia" {{ old('country', $admin->country) == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                                <option value="Lebanon" {{ old('country', $admin->country) == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                                <option value="Lesotho" {{ old('country', $admin->country) == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                <option value="Liberia" {{ old('country', $admin->country) == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                                <option value="Libya" {{ old('country', $admin->country) == 'Libya' ? 'selected' : '' }}>Libya</option>
                                <option value="Liechtenstein" {{ old('country', $admin->country) == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                <option value="Lithuania" {{ old('country', $admin->country) == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                                <option value="Luxembourg" {{ old('country', $admin->country) == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                                <option value="Madagascar" {{ old('country', $admin->country) == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                                <option value="Malawi" {{ old('country', $admin->country) == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                                <option value="Malaysia" {{ old('country', $admin->country) == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                <option value="Maldives" {{ old('country', $admin->country) == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                <option value="Mali" {{ old('country', $admin->country) == 'Mali' ? 'selected' : '' }}>Mali</option>
                                <option value="Malta" {{ old('country', $admin->country) == 'Malta' ? 'selected' : '' }}>Malta</option>
                                <option value="Marshall Islands" {{ old('country', $admin->country) == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                                <option value="Mauritania" {{ old('country', $admin->country) == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                                <option value="Mauritius" {{ old('country', $admin->country) == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                                <option value="Mexico" {{ old('country', $admin->country) == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                <option value="Micronesia" {{ old('country', $admin->country) == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
                                <option value="Moldova" {{ old('country', $admin->country) == 'Moldova' ? 'selected' : '' }}>Moldova</option>
                                <option value="Monaco" {{ old('country', $admin->country) == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                                <option value="Mongolia" {{ old('country', $admin->country) == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                                <option value="Montenegro" {{ old('country', $admin->country) == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                                <option value="Morocco" {{ old('country', $admin->country) == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                                <option value="Mozambique" {{ old('country', $admin->country) == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                <option value="Myanmar" {{ old('country', $admin->country) == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                                <option value="Namibia" {{ old('country', $admin->country) == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                                <option value="Nauru" {{ old('country', $admin->country) == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                                <option value="Nepal" {{ old('country', $admin->country) == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                <option value="Netherlands" {{ old('country', $admin->country) == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                <option value="New Zealand" {{ old('country', $admin->country) == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                <option value="Nicaragua" {{ old('country', $admin->country) == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                                <option value="Niger" {{ old('country', $admin->country) == 'Niger' ? 'selected' : '' }}>Niger</option>
                                <option value="Nigeria" {{ old('country', $admin->country) == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                <option value="Norway" {{ old('country', $admin->country) == 'Norway' ? 'selected' : '' }}>Norway</option>
                                <option value="Oman" {{ old('country', $admin->country) == 'Oman' ? 'selected' : '' }}>Oman</option>
                                <option value="Pakistan" {{ old('country', $admin->country) == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                <option value="Palau" {{ old('country', $admin->country) == 'Palau' ? 'selected' : '' }}>Palau</option>
                                <option value="Palestine" {{ old('country', $admin->country) == 'Palestine' ? 'selected' : '' }}>Palestine</option>
                                <option value="Panama" {{ old('country', $admin->country) == 'Panama' ? 'selected' : '' }}>Panama</option>
                                <option value="Papua New Guinea" {{ old('country', $admin->country) == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                                <option value="Paraguay" {{ old('country', $admin->country) == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                                <option value="Peru" {{ old('country', $admin->country) == 'Peru' ? 'selected' : '' }}>Peru</option>
                                <option value="Philippines" {{ old('country', $admin->country) == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                <option value="Poland" {{ old('country', $admin->country) == 'Poland' ? 'selected' : '' }}>Poland</option>
                                <option value="Portugal" {{ old('country', $admin->country) == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                <option value="Qatar" {{ old('country', $admin->country) == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                <option value="Romania" {{ old('country', $admin->country) == 'Romania' ? 'selected' : '' }}>Romania</option>
                                <option value="Russia" {{ old('country', $admin->country) == 'Russia' ? 'selected' : '' }}>Russia</option>
                                <option value="Rwanda" {{ old('country', $admin->country) == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                                <option value="Saint Kitts and Nevis" {{ old('country', $admin->country) == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                <option value="Saint Lucia" {{ old('country', $admin->country) == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                                <option value="Saint Vincent and the Grenadines" {{ old('country', $admin->country) == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                <option value="Samoa" {{ old('country', $admin->country) == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                                <option value="San Marino" {{ old('country', $admin->country) == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                                <option value="Sao Tome and Principe" {{ old('country', $admin->country) == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                <option value="Saudi Arabia" {{ old('country', $admin->country) == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                <option value="Senegal" {{ old('country', $admin->country) == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                <option value="Serbia" {{ old('country', $admin->country) == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                                <option value="Seychelles" {{ old('country', $admin->country) == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                                <option value="Sierra Leone" {{ old('country', $admin->country) == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                                <option value="Singapore" {{ old('country', $admin->country) == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                <option value="Slovakia" {{ old('country', $admin->country) == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                                <option value="Slovenia" {{ old('country', $admin->country) == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                                <option value="Solomon Islands" {{ old('country', $admin->country) == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                                <option value="Somalia" {{ old('country', $admin->country) == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                                <option value="South Africa" {{ old('country', $admin->country) == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                <option value="South Sudan" {{ old('country', $admin->country) == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
                                <option value="Spain" {{ old('country', $admin->country) == 'Spain' ? 'selected' : '' }}>Spain</option>
                                <option value="Sri Lanka" {{ old('country', $admin->country) == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                <option value="Sudan" {{ old('country', $admin->country) == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                                <option value="Suriname" {{ old('country', $admin->country) == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                                <option value="Sweden" {{ old('country', $admin->country) == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                <option value="Switzerland" {{ old('country', $admin->country) == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                <option value="Syria" {{ old('country', $admin->country) == 'Syria' ? 'selected' : '' }}>Syria</option>
                                <option value="Taiwan" {{ old('country', $admin->country) == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                <option value="Tajikistan" {{ old('country', $admin->country) == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                                <option value="Tanzania" {{ old('country', $admin->country) == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                <option value="Thailand" {{ old('country', $admin->country) == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                <option value="Timor-Leste" {{ old('country', $admin->country) == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
                                <option value="Togo" {{ old('country', $admin->country) == 'Togo' ? 'selected' : '' }}>Togo</option>
                                <option value="Tonga" {{ old('country', $admin->country) == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                                <option value="Trinidad and Tobago" {{ old('country', $admin->country) == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                <option value="Tunisia" {{ old('country', $admin->country) == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                <option value="Turkey" {{ old('country', $admin->country) == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                <option value="Turkmenistan" {{ old('country', $admin->country) == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                                <option value="Tuvalu" {{ old('country', $admin->country) == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                                <option value="Uganda" {{ old('country', $admin->country) == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                <option value="Ukraine" {{ old('country', $admin->country) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                <option value="United Arab Emirates" {{ old('country', $admin->country) == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                <option value="United Kingdom" {{ old('country', $admin->country) == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="United States" {{ old('country', $admin->country) == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="Uruguay" {{ old('country', $admin->country) == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                                <option value="Uzbekistan" {{ old('country', $admin->country) == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                <option value="Vanuatu" {{ old('country', $admin->country) == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                                <option value="Vatican City" {{ old('country', $admin->country) == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
                                <option value="Venezuela" {{ old('country', $admin->country) == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                                <option value="Vietnam" {{ old('country', $admin->country) == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                <option value="Yemen" {{ old('country', $admin->country) == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                <option value="Zambia" {{ old('country', $admin->country) == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                <option value="Zimbabwe" {{ old('country', $admin->country) == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{ old('city', $admin->city) }}" placeholder="Moscow" required>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Profile Pic</label>
                                <input type="file" name="profile_pic" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="padding-left:100px;">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a href="{{ route('admin-profile') }}" class="text-primary btn-link">Back to Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
@endsection
