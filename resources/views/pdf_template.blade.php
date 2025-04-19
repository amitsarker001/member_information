<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: solaiman_lipi, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0 40px;
            text-align: justify; /* ✅ Add this line */
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 80px;
            float: left;
        }
        .top-bar {
            border-bottom: 2px solid #000;
            margin-bottom: 10px;
            padding-bottom: 5px;
            position: relative;
        }
        .photo-box {
            border: 1px solid #000;
            width: 100px;
            height: 120px;
            text-align: center;
            line-height: 120px;
            float: right;
            font-size: 12px;
            margin-top: -80px;
        }
        .images-row {
            margin-top: 5px;
            text-align: right;
        }
        .images-row img {
            width: 55px;
            margin-left: 5px;
            border-radius: 3px;
        }
        .title {
            font-size: 22px;
            color: #c00;
            font-weight: bold;
        }
        .sub-title {
            font-size: 16px;
            color: #333;
        }
        .form-section {
            clear: both;
            margin-top: 20px;
            text-align: justify; /* ✅ Just to be safe */
        }
        .form-line {
            margin-bottom: 6px;
            text-align: justify; /* ✅ Optional: add here too */
        }
        .footer {
            text-align: right;
            margin-top: 60px;
        }
        .note {
            font-size: 12px;
            margin-top: 20px;
            text-align: justify; /* ✅ For the declaration section */
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .divider {
            height: 6px;
            background: linear-gradient(to right, green 33%, red 33%);
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <img src="{{ public_path('images/logo.png') }}" class="logo">
    <div class="header">
        <div>বাংলাদেশ</div>
        <div class="sub-title">কৃষিবিদদের মহানগরীর বাহিনী</div>
        <div class="title">ঢাকাস্থ বাবুগঞ্জ উপজেলা জাতীয়তাবাদী ফোরাম</div>
        <div class="sub-title">ইন্দিরা রোড, ফার্মগেট, ঢাকা।</div>
    </div>
    <div class="images-row">
            @if(file_exists(public_path('assets/images/static/1.jpg')))
                <img src="file://{{ public_path('assets/images/static/1.jpg') }}" width="50">
            @endif
                @if(file_exists(public_path('assets/images/static/2.jpg')))
                    <img src="file://{{ public_path('assets/images/static/2.jpg') }}" width="50">
                @endif

                @if(file_exists(public_path('assets/images/static/3.jpg')))
                    <img src="file://{{ public_path('assets/images/static/3.jpg') }}" width="50">
                @endif

    </div>
</div>

<div class="photo-box">পাসপোর্ট ছবি</div>

<div class="form-section">
    <p><strong>সদস্য নং:</strong> _______________________</p>
    <div class="form-line"  style="text-align: justify;">০১। নামঃ {{ '..................' . ('Amit Sarker' ?? '') . '..................' }}</div>

    <div class="form-line">০১। নামঃ .................................................................................................................................................</div>
    <div class="form-line">০২। পিতার নামঃ ....................................................................................................................................</div>
    <div class="form-line">০৩। মাতার নামঃ .....................................................................................................................................</div>
    <div class="form-line">০৪। বর্তমান ঠিকানাঃ ..................................................................................................................................</div>
    <div class="form-line">০৫। স্থায়ী ঠিকানা ও গ্রামঃ .................................................... পোঃ ..................... ইউনিয়নঃ .......................</div>
    <div class="form-line">০৬। বর্তমান রাজনৈতিক পদবীর নামঃ ............................................................................................</div>
    <div class="form-line">০৭। পূর্বের রাজনৈতিক পদবীর নামঃ ..............................................................................................</div>
    <div class="form-line">০৮। নিজ ভোট কেন্দ্রের নাম ও ওয়ার্ডঃ .........................................................................................</div>
    <div class="form-line">০৯। জাতীয় পরিচয়পত্র নং (ফটো কপি সংযুক্ত): ................................................................................</div>
    <div class="form-line">১০। ধর্মঃ ............................................................. ফোনঃ ..............................................................................</div>
    <div class="form-line">১১। মোবাইল নংঃ .................................................. ফেইসবুক আইডিঃ .........................................................</div>
    <div class="form-line">১২। শিক্ষাগত যোগ্যতাঃ ....................................................................................................................</div>
    <div class="form-line">১৩। মামলার সংখ্যাঃ ..........................................................................................................................</div>
    <div class="form-line">১৪। কারণের (যদি থাকে) হ্যাঁ/না ........................................................................................................</div>

    <div class="form-line">
        ১৫। আমাদের লক্ষ্য ও উদ্দেশ্যঃ শহীদ রাষ্ট্রপতি জিয়াউর রহমানের ১৯ দফা কর্মসূচী, সাবেক প্রধানমন্ত্রী দেশনেত্রী বেগম খালেদা জিয়ার
        উন্নয়নশীল বাংলাদেশ এবং বিএনপির ভারপ্রাপ্ত চেয়ারম্যান জনাব তারেক রহমানের ৩১ দফা রাষ্ট্র মেরামতের কর্মসূচী বাস্তবায়ন।
    </div>

    <div class="form-line">
        ১৬। আপনার ঢাকাস্থ বাবুগঞ্জ উপজেলা জাতীয়তাবাদী ফোরাম কে শক্তিশালী করার জন্য আপনার মতামত উপস্থাপন করুনঃ ..............................
    </div>
</div>

<div class="note">
    আমি এই মর্মে অঙ্গীকার করছি যে উপরের তথ্য সম্পূর্ণ সত্য এবং আমি স্বজ্ঞানে সুস্থ মস্তিষ্কে ইহা প্রদান করিতেছি।
    <br>
    কোনটি ভুল থাকিলে তার দায় আমি বহন করিতে বাধ্য থাকিব।
</div>

<div class="signature">সাক্ষরকারী</div>

<div class="divider"></div>

</body>
</html>
