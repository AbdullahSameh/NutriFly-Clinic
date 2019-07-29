<?php 

/**
 *  Translate site to English Arabic 
 *   
 *  @return array
*/
function lang($key) {
    global $lang;
    $lang = [
        /**
         *  Translate Login page
        */
        'login' => 'تسجيل الدخول',
        'signup' => 'التسجيل',
        'login-account' => 'تسجيل الدخول إلى حسابك',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة السر',
        'log-in' => 'تسجيل الدخول',
        'create-account' => 'أنشئ حسابك',
        'first-name' => 'الاسم الاول',
        'last-name' => 'اسم العائلة',
        'write-email' => 'البريد الإلكتروني الخاص بك',
        'eg' =>'مصر',
        'ae' =>'الامارات المتحدة',
        'sa' =>'السعودية',
        'kw' =>'الكويت',
        'bh' =>'البحرين',
        'om' =>'عمان',
        'qa' =>'قطر',
        'male' => 'ذكر',
        'female' => 'أنثى',

        /**
         *  Translate Home page
        */
        'language' => 'اللغة',
        'my-profile' => 'الصفحة الشخصية',
        'my-orders' => 'الأوردرات',
        'logout' => 'تسجيل الخروج',
        'home' => 'الصفحة الرئيسة',
        'products' => 'المنتجات',
        'nutrtion-plan' => 'الخطة الغذائية',
        'success-stories' => 'قصص نجاح',
        'about-us' => 'من نحن',
        'contact-us' => 'الاتصال بنا',
        'view-cart' => 'عربة المنتجات',
        'check-out' => 'الشراء',
        'cart-is-empty' => 'عربة التسوق فارغة',
        'latest-products' => 'أحدث المنتجات',
        'main-categories' => 'الأقسام الرئيسية',
        'category' => 'الاقسام',
        'all-products' => 'جميع المنتجات',
        'about-us-title1' => 'منتجات نيوترى فلاى',
        'about-us-title2' => 'الصحية',
        'about-us-message' => 'نيوترى فلاى بدأت كمركز تغذية وتجميل منذ عام 2012 . نجحت  نيوترى فلاى توصيل مئات الحالات لحالة صحية أفضل عن طريق نشر وتطبيق اخر ما توصل إليه العلم الحديث فى التغذية العلاجية. وامتدادا الى ما يتوجة إلية العالم الى توفير كل ما هو صحى ومفيد وطبيعى وبعيدا عن كل ما هو صناعى بقدر الإمكان .هو الحل الامثل للوقاية من الأمراض . وجاء توفير موقع نيوترى فلاى بهدف. توفير كل ما هو صحى فى مكان واحد ايضا توفير النصيحة الغذائية لعدد أكبر من الأفراد من قبل متخصصين وذوى خبرة.',
        'contact-us' => 'الاتصال بنا',
        'con-us-name' => 'الاسم',
        'con-us-email' => 'الايمل الخاص بك',
        'con-us-subject' => 'الموضوع',
        'con-us-message' => 'الرسالة',
        'con-us-send' => 'إرسال رسالة',
        'con-us-error-name' => 'مطلوب على الاقل 3 احرف',
        'con-us-error-email' => 'يرجى إدخال البريد الإلكتروني صحيح',
        'con-us-error-subject' => 'مطلوب على الاقل 3 احرف',
        'con-us-error-message' => 'مطلوب على الاقل 10 احرف',
        'navigation' => 'التنقل',
        'follow-us' => 'تابعنا على : ',

        /**
         *  Translate profile page
        */
        'edit-profile' => 'تعديل الملف الشخصي',
        'personal-info' => 'المعلومات الشخصية',
        'gender' => 'النوع',
        'birthday' => 'تاريخ الميلاد',
        'country' => 'البلد',
        'account-info' => 'معلومات الحساب',
        'confirm-password' => 'تاكيد كلمة السر',
        'profile-img' => 'الصورة السخصية',
        'update-profile' => 'تحديث الملف الشخصي',

        /**
         *  Translate product page
         */
        'product-weight' => 'وزن المنتج',
        'description' => 'وصف المنتج',
        'add-to-cart' => 'أضف إلى السلة',
        'features' => 'المميزات',
        'warning' => 'التحزيرات',
        'how-to-use' => 'طريقة الاستخدام',
        'ingredients' => 'المكونات',
        'gm' => 'جرام',
        'egp' => 'جنية',

        /**
         *  Translate orders page
        */
        'manage-orders' => 'إدارة الطلبات الخاص بك',
        'user-name' => 'اسم العضو',
        'total' => 'الجمالي',
        'total-items' => 'اجمالي المنتجات',
        'paid' => 'مدفوع',
        'created-at' => 'أنشئ في',
        'action' => 'الأوامر',
        'show' => 'إظهار',
        'order-details' => 'تفاصيل الفاتورة',
        'total-bill' => 'اجمالي الفاتورة',
        'product-name' => 'اسم المنتج',
        'price' => 'السعر',
        'quantity' => 'الكمية',

        /**
         *  Translate shopping cart page
        */
        'shopping-cart' => 'عربة التسوق',
        'total-amount' => 'المبلغ الإجمالي',
        'update-qty' => 'تحديث الكمية',
        'delete' => 'حذف',
        'proceed-to-checkout' => 'التوجه الي الشراء',

        /**
         *  Translate checkout page
        */
        'address' => 'العنوان',
        'city' => 'المدينة',
        'area' => 'المنطقة',
        'street' => 'اسم الشارع / رقم',
        'building' => 'اسم المبنى / رقم',
        'floor' => 'رقم الطابق',
        'apartment' => 'رقم الشقة',
        'landmark' => 'علامة مميزة',
        'mobile' => 'الهاتف المحمول',
        'mobile2' => 'الهاتف المحمول 2',
        'your-order' => 'الطلب الخاص بك',
        'grand-total' => 'المبلغ الإجمالي',
        'shipping' => 'تكلفة الشحن وفقا للمسافة',
        'please-order' => 'اطلب',

        /**
         *  Translate nutrtion plan forms
        */
        'nutrtion-plan' => 'الخطة الغذائية',
        'nutrtion-plan-head' => 'ما هي الخطة الغذائية؟',
        'nutrtion-plan-message' => 'هى مجموعة من الخطوات الصحية التى تقوم بها للوصول لحالة صحية افضل بالطرق الطبيعية . اضافة لمعرفة الاحتياجات الغذائية لكل مرحلة عمرية . واستخدام هذة الخطوات الصحية لتجنب الامراض العصرية مثل السمنة والاكتئاب ومشاكل القلب ومشاكل الاعصاب وسوء التغذية سواء للاطفال او البالغين وكل هذة الخطوات تقدم اليك عن طريق مجموعة من ممتازة من المتخصصين',
        'get-nutrtion-plan' => 'الحصول على خطة غذائية',
        'nutrtion-plan-data' => 'بيانات الخطة الغذائية',
        'age' => 'العمر',
        'height' => 'الطول',
        'height-desc' => 'الطول بالسنتيمتر',
        'carrent-weight' => 'الوزن الحالي',
        'carrent-weight-desc' => 'الوزن الحالي بالكيلو جرام',
        'desired-weight' => 'الوزن المطلوب',
        'desired-weight-desc' => 'الوزن المطلوب بالكيلو جرام',
        'health-status' => 'الحالة الصحية',
        'health-status-desc' => 'الحالة الصحية مثلا اذا كان لديك أي مرض',
        'send-nutrtion-data' => 'ارسال البيانات الغذائية',
        'send-nutrtion-success' => 'سعداء بحضرتك فى نيوترى فلاى . سيتم التواصل معك بخصوص الخطة الغذائية المناسبة لحالتك الصحية فى خلال 24 ساعة',

        /**
         *  Translate errors forms
        */
        'csrf_token' => 'عذرًا ، حدث خطأ. الرجاء إعادة محاولة طلبك',
        'login_email' => 'الرجاء إدخال عنوان البريد الإلكتروني',
        'valid_email' => 'الرجاء إدخال بريد إلكتروني صالح',
        'login_pass' => 'من فضلك أدخل كلمة السر',
        'login_data' => 'بيانات تسجيل الدخول غير صالحة',
        'first_name' => 'الإسم الأول مطلوب',
        'last_name' => 'اسم العائلة مطلوب',
        'birthday_error' => 'تاريخ الميلاد مطلوب',
        'password_minLen' => 'يجب أن تكون كلمة المرور أكثر من 6 أحرف',
        'password_maxLen' => 'يجب أن تكون كلمة المرور أقل من 20 حرفًا',
        'password_match' => 'تأكيد كلمة المرور يجب أن تتطابق مع كلمة المرور',
        'email_error' => 'الايميل مطلوب',
        'age_error' => 'العمر مطلوب',
        'height_error' => 'الطول مطلوب',
        'carrentd_weight_error' => 'الوزن الحالي مطلوب',
        'desired_weight_error' => 'الوزن المطلوب مطلوب',
        'mobile_error' => 'الموبيل مطلوب',
        'health_status_error' => 'الحالة الصحية مطلوبة',

        'city_error' => 'المدينة مطلوبة',
        'area_error' => 'المنطقة مطلوبة',
        'street_error' => 'الشارع مطلوب',
        'building_error' => 'المبنى مطلوب',
        'floor_error' => 'الطابق مطلوب',
        'floor_error_number' => 'يجب أن يكون الطابق رقم',
        'apartment_error' => 'الشقة مطلوبة',
        'apartment_error_number' => 'يجب أن تكون الشقة رقم',
        'landmark_error' => 'العلامة المميزة مطلوبة',
    ];
    return $lang[$key];
}