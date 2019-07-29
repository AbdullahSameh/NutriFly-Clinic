<?php 

/**
 *  Translate site to English language 
 *   
 *  @return array
*/
function lang($key) {
    global $lang;
    $lang = [
        /**
         *  Translate Login page
        */
        'login' => 'Login',
        'signup' => 'Signup',
        'login-account' => 'Log Into Your Account',
        'email' => 'Email',
        'password' => 'Password', //
        'log-in' => 'Log In', //
        'create-account' => 'Create Your Account',
        'first-name' => 'First Name', //
        'last-name' => 'Last Name', //
        'write-email' => 'Write Your Email',
        'eg' =>'Egypt',
        'ae' =>'United Arab Emirates',
        'sa' =>'Saudi Arabia',
        'kw' =>'Kuwait',
        'bh' =>'Bahrain',
        'om' =>'Oman',
        'qa' =>'Qatar',
        'male' => 'Male',
        'female' => 'Female',

        /**
         *  Translate Home page
        */
        'language' => 'Language',
        'my-profile' => 'My Profile',
        'my-orders' => 'My Orders',
        'logout' => 'Log Out',
        'home' => 'Home',
        'products' => 'Products',
        'nutrtion-plan' => 'Nutrtion plan',
        'success-stories' => 'Success Stories',
        'about-us' => 'About Us',
        'contact-us' => 'Contact Us',
        'view-cart' => 'View Cart',
        'check-out' => 'Check Out',
        'cart-is-empty' => 'Shopping cart is currently empty',
        'latest-products' => 'The Latest Products',
        'main-categories' => 'The Main Categories',
        'category' => 'Categories',
        'all-products' => 'All Products',
        'about-us-title1' => 'NutriFly Health',
        'about-us-title2' => 'Products',
        'about-us-message' => 'NutriFly Clinic has started as a nutrition and beauty center since 2012. NutriFly Clinic has successfully connected hundreds of cases to a better health condition by deploying and applying the latest findings of modern science in therapeutic nutrition. And an extension to what goes beyond the world to provide everything that is healthy and useful and natural and away from everything that is industrial as much as possible. It is the ideal solution for the prevention of diseases. The provision of the site came with the intention of. Providing all that is healthy in one place also provide nutritional advice to a larger number of individuals by specialists and experienced.',
        'contact-us' => 'Contact Us',
        'con-us-name' => 'Your name',
        'con-us-email' => 'Your Email',
        'con-us-subject' => 'Subject',
        'con-us-message' => 'Your Message',
        'con-us-send' => 'Send Message',
        'con-us-error-name' => 'Minimum 3 characters required',
        'con-us-error-email' => 'Please enter a valid Email',
        'con-us-error-subject' => 'Minimum 3 characters required',
        'con-us-error-message' => 'Minimum 10 characters required',
        'navigation' => 'Navigation',
        'follow-us' => 'Follow Us : ',

        /**
         *  Translate profile page
        */
        'edit-profile' => 'Edit Profile',
        'personal-info' => 'Personal Information',
        'gender' => 'Gender',
        'birthday' => 'Birthday',
        'country' => 'Country',
        'account-info' => 'Account Information',
        'confirm-password' => 'Confirm Password',
        'profile-img' => 'Your Image',
        'update-profile' => 'Update Profile',
        
        /**
         *  Translate product page
         */
        'product-weight' => 'Product weight',
        'description' => 'Description',
        'add-to-cart' => 'Add To Cart',
        'features' => 'Features',
        'warning' => 'Warning',
        'how-to-use' => 'How to Use',
        'ingredients' => 'Ingredients',
        'gm' => 'gm',
        'egp' => 'EGP',

        /**
         *  Translate orders page
        */
        'manage-orders' => 'Manage Your Orders',
        'user-name' => 'User Name',
        'total' => 'Total',
        'total-items' => 'Total Items',
        'paid' => 'Paid',
        'created-at' => 'Created at',
        'action' => 'Action',
        'show' => 'Show',
        'order-details' => 'Order Details',
        'total-bill' => 'Total bill',
        'product-name' => 'Product Name',
        'price' => 'Price',
        'quantity' => 'Quantity',

        /**
         *  Translate shopping cart page
        */
        'shopping-cart' => 'Shopping Cart',
        'total-amount' => 'Total Amount',
        'update-qty' => 'Update',
        'delete' => 'Delete',
        'proceed-to-checkout' => 'proceed to checkout',

        /**
         *  Translate checkout page
        */
        'address' => 'Address',
        'city' => 'City',
        'area' => 'Area',
        'street' => 'Street Name/No',
        'building' => 'Building Name/No',
        'floor' => 'Floor No',
        'apartment' => 'Apartment No',
        'landmark' => 'Nearest Landmark',
        'mobile' => 'Mobile',
        'mobile2' => 'Mobile 2',
        'your-order' => 'Your Order',
        'item-name' => 'Item Name',
        'qty' => 'QTY',
        'total-amount' => 'Total amount',
        'shipping' => 'Shipping Cost According To Distance',
        'please-order' => 'Please Order',

        /**
         *  Translate nutrtion plan forms
        */
        'nutrtion-plan' => 'Nutrition Plan',
        'nutrtion-plan-head' => 'What is the nutrition plan?',
        'nutrtion-plan-message' => 'It\'s a healthy steps to achieve a better health condition by natural means. In addition to the nutritional needs of each age. And use these health steps to avoid modern diseases such as obesity, depression, heart problems, neurological problems, and malnutrition for both children and adults all these steps are presented to you by a set of excellent nutrition specialists',
        'get-nutrtion-plan' => 'Get Nutrtion Plan',
        'nutrtion-plan-data' => 'Nutrition plan data',
        'age' => 'Age',
        'height' => 'Height',
        'height-desc' => 'Your Height By Centimeter',
        'carrent-weight' => 'Carrent Weight',
        'carrent-weight-desc' => 'Your Carrent Weight By Kg',
        'desired-weight' => 'Desired Weight',
        'desired-weight-desc' => 'Desired Carrent Weight By Kg',
        'health-status' => 'Health Status',
        'health-status-desc' => 'Your Health Status like you have any disease',
        'send-nutrtion-data' => 'Send Nutrtion Data',
        'send-nutrtion-success' => 'Pleased to attend the NutriFly Clinic. We will communicate with you about the nutrition plan for your health status within 24 hours',

        /**
         *  Translate errors forms
        */
        'csrf_token' => 'Sorry, there was an error.Please retry your request',
        'login_email' => 'Please insert email address',
        'valid_email' => 'Please insert valid email',
        'login_pass' => 'Please insert your password',
        'login_data' => 'Invalid login data',
        'first_name' => 'First name is required',
        'last_name' => 'Last name is required',
        'birthday_error' => 'Birthday is required',
        'password_minLen' => 'Password must be more than 6 chrcters',
        'password_maxLen' => 'Password must be less than 20 chrcters',
        'password_match' => 'Confirm Password should match Password',
        'email_error' => 'Email is required',
        'age_error' => 'Age is required',
        'height_error' => 'Height is required',
        'carrentd_weight_error' => 'Carrent Weight is required',
        'desired_weight_error' => 'Desired Weight is required',
        'mobile_error' => 'Mobile is required',
        'health_status_error' => 'Health Status is required',

        'city_error' => 'City is required',
        'area_error' => 'Area is required',
        'street_error' => 'Street is required',
        'building_error' => 'Building is required',
        'floor_error' => 'Floor is required',
        'floor_error_number' => 'Floor accepts only number digit',
        'apartment_error' => 'Apartment is required',
        'apartment_error_number' => 'Apartment accepts only number digit',
        'landmark_error' => 'Landmark is required',
    ];
    return $lang[$key];
}