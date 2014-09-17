<?php

return array(

    'username' => 'إسم المستخدم',
    'password' => 'كلمة المرور',
    'password_confirmation' => 'تحقيق كلمة المرور',
    'e_mail' => 'الإيميل',
    'username_e_mail' => 'إسم المستخدم أو الايميل',

    'signup' => array(
        'title' => 'تسجيل',
        'desc' => 'تسجيل حساب جديد ',
        'confirmation_required' => 'التحقيق مطلوب',
        'submit' => 'إنشاء حساب جديد',
    ),

    'login' => array(
        'title' => 'تسجيل دخول',
        'desc' => 'أدخل بياناتك',
        'forgot_password' => 'نسيت كلمة المرور؟',
        'remember' => 'تذكرني؟',
        'submit' => 'تسجيل دخول',
    ),

    'forgot' => array(
        'title' => 'نسيت كلمة المرور',
        'submit' => 'استمرار',
    ),

    'alerts' => array(
        'account_created' => 'تم تسجيل حسابك بنجاح. الرجاء التحقق من إيميلك لوجود توجيهات لكيفية تأكيد حسابك',
        'too_many_attempts' => 'محاولات خاطئة كثيرة، الرجاء المحاولة بعد عدة دقائق',
        'wrong_credentials' => 'اسم دخول غير صحيح أو الايميل أو كلمة المرور',
        'not_confirmed' => 'يبدو ان حسابك غير منشط، راجع ايميلك لوجود رسالة تأكيد.',
        'confirmation' => 'تم تنشيط حسابك الان! يمكنك الان تسجيل الدخول بنجاح',
        'wrong_confirmation' => 'كود تنشيط خاطئ',
        'password_forgot' => 'بيانات استعادة كلمة مرورك تم ارسالها إلى ايميلك',
        'wrong_password_forgot' => 'لم يتم العثور على المستخدم',
        'password_reset' => 'تم تغيير كلمة مرورك بنجاح',
        'wrong_password_reset' => 'كلمة مرور خاطئة، الرجاء معاودة المحاولة',
        'wrong_token' => 'تعرفة استعادة كلمة المرور غير صحيحة ، الرجاء المحاولة مره أخرى.',
        'duplicated_credentials' => 'البيانات المستخدمة موجودة مسبقاً ، الرجاء استخدام بيانات أخرى',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'بيانات تأكيد الحساب',
            'greetings' => 'مرحبا :name',
            'body' => 'الرجاء الدخول على الرابط التالي لتأكيد حسابك ',
            'farewell' => 'نشكرك لتسجيلك معنا',
        ),

        'password_reset' => array(
            'subject' => 'إستعادة كلمة المرور',
            'greetings' => 'مرحباً :name',
            'body' => 'الرجاء اتباع الرابط التالي لكي تستعيد كلمة مرورك.',
            'farewell' => 'شكراً لتواصلك معنا',
        ),
    ),

);
