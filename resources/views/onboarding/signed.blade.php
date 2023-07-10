<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Inspiring our generation since 1996</title>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="oratorio music foundation developers">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="shortcut icon" href="https://oratoriogroup.org/concert_favicon.png">
    <link rel="canonical" href="@yield('canonical')" />

    <meta name="msapplication-TileColor" content="#E70000">
    <meta name="theme-color" content="#E70000">

    <link rel="preload" href="{{ asset('asset/css/icons.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('asset/css/icons.css') }}">
    <link rel="preload" href="{{ asset('asset/css/uikit.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('asset/css/uikit.css') }}">
    <link rel="preload" href="{{ asset('asset/css/connect.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('asset/css/connect.css') }}">
    <link rel="preload" href="{{ asset('asset/dist/tailwind.min.css') }}" as="style">
    <link href="{{ asset('asset/dist/tailwind.min.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #E2E8F0;
        }
    </style>
    <div class="main_content">
        <div class="mcontainer">
            <div class="bg-white max-w-4xl mx-auto md:p-10 p-6 relative rounded-md shadow">
                <div class="md:space-y-6 space-y-4 text-gray-400 md:text-lg">

                    <div>
                        <div class="text-sm md:leading-8 leading-7">

                            <div class="font-semibold md:text-2xl text-md text-gray-700 md:pt-12 pt-10">I. Membership Requirements and Commitments </div>
                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> A. Faith and Membership Application</div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Every member must have a genuine personal relationship with Jesus Christ.
                            </div>
                            <div class="text-sm md:leading-8 leading-7">2. Prospective members should complete a membership form and pass through an auditioning process to join the Oratorio Group.</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2">B. Meeting Attendance and Active Participation</div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members are expected to attend all group meetings regularly and punctually.
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Active participation in discussions, decision-making processes, and learning new songs is required.</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> C. Preparation and Skill Development </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members must dedicate time to practice and prepare for rehearsals, performances, and other activities.
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Continual learning of new songs and introducing fresh ideas to the group is encouraged.</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> D. Assigned Responsibilities and Sub-Unit Involvement </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members are accountable for fulfilling responsibilities assigned to them, such as performances and event organization.
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Active participation in sub-units (e.g., decoration, organizing, welfare, prayer) is expected.</div>
                            <div class="font-semibold md:text-2xl text-lg text-gray-700 md:pt-12 pt-10">II. Financial Obligations and Fundraising </div>
                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> A. Annual Dues Payment</div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members must pay their annual dues at the beginning of each semester.
                            </div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> B. Costume Expenses
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members must be willing to contribute financially by paying for their costumes or necessary attire for performances and events.
                            </div>

                            <div class="font-semibold md:text-2xl text-lg text-gray-700 md:pt-12 pt-10">III. Personal Conduct and Representation</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> A. Brand Ambassadors and Promotion
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members should represent the Oratorio Group in a positive manner, upholding its values and mission.

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Active promotion of the group, including selling at least 5 membership forms, is expected.</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> B. Spiritual Commitment
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members must be available for fasting and prayer sessions called by the groups leadership.

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Personal holiness, prayerfulness, and integrity are essential.</div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> C. Commitment Priority
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members should give priority to the Oratorio Groups activities over other non-academic commitments.
                            </div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2">D. Confidentiality

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members must maintain the confidentiality of sensitive information shared within the Oratorio Group.

                                <div class="font-semibold md:text-2xl text-lg text-gray-700 md:pt-12 pt-10">IV. Alumni Engagement and Mentorship</div>

                            </div>

                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> A. Networking and Alumni Support

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Graduated members are encouraged to remain in contact with the Oratorio Group and actively participate in alumni activities.

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 2. Mentoring and supporting new students and networking opportunities are expected.</div>


                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> B. Asset Management

                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members may be entrusted with the management and care of assets owned by the Oratorio Group.

                            </div>
                            <div class="font-semibold md:text-sm text-sm text-gray-700 mt-2"> C. Continuous Growth
                            </div>
                            <div class="text-sm md:leading-8 leading-7"> 1. Members are encouraged to embrace a growth mindset and seek personal and spiritual growth within the group.

                            </div>
                            @php $currentDate = date('F j, Y'); @endphp

                            <div class="text-sm md:leading-8 leading-7"> 2. Personal holiness, prayerfulness, and integrity are essential.</div>
                            <div class="font-seminold md:text-sm text-sm text-gray-700 mt-2">Signatory</div>
                            I {{ auth()->user()->name }} {{ auth()->user()->last_name }}, have read and understood the Membership Terms and Obligations of the Oratorio Music Foundation. I hereby agree to abide by these terms and fulfill my responsibilities as a member of the foundation.
                            <div class="font-seminold md:text-sm text-sm text-gray-700 mt-2">Date: <strong>{{ $currentDate }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var downloadLink = document.createElement('a');
            downloadLink.href = "{{ route('dashboard.index') }}";
            downloadLink.download = 'agreement.pdf';
            downloadLink.click();
        }, 2000);
    </script>
    <link rel="preload" href="{{ asset('asset/dist/jquery-3.6.0.min.js') }}" as="script" crossorigin="anonymous">
    <script src="{{ asset('asset/dist/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script>
    <link rel="preload" href="{{ asset('asset/js/tippy.all.min.js') }}" as="script">
    <script src="{{ asset('asset/js/tippy.all.min.js') }}"></script>
    <link rel="preload" href="{{ asset('asset/js/uikit.js') }}" as="script">
    <script src="{{ asset('asset/js/uikit.js') }}"></script>
    <link rel="preload" href="{{ asset('asset/js/simplebar.js') }}" as="script">
    <script src="{{ asset('asset/js/simplebar.js') }}"></script>
    <link rel="preload" href="{{ asset('asset/js/custom.js') }}" as="script">
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    <link rel="preload" href="{{ asset('asset/js/bootstrap-select.min.js') }}" as="script">
    <script src="{{ asset('asset/js/bootstrap-select.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons.js"></script>