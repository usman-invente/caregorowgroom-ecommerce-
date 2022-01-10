<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');
    Route::get('/me', 'AdminController@me')->name('admin.me');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    // active status
    Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
    Route::delete('activation/{admin}', 'ActivationController@deactivate');
    Route::resource('permission', 'PermissionController');
  
    Route::get('add/product', 'AdminProductController@addProductForm')->name('admin.add.product');
    Route::get('all/product', 'AdminProductController@allProduct')->name('admin.all.product');
    Route::post('all/product', 'AdminProductController@getProducts')->name('admin.getproducts');
    Route::post('add/product', 'AdminProductController@addProduct')->name('admin.addproduct');
    Route::get('edit/product/{id}', 'AdminProductController@editProduct')->name('admin.edit.prodct');
    Route::post('edit/product', 'AdminProductController@productEdit')->name('admin.editproduct'); 
    Route::DELETE('delete/product', 'AdminProductController@deleteProduct')->name('admin.delete.product');   
   
    Route::get('orders', 'AdminProductController@orders')->name('admin.allorder');
    Route::post('admin/orders', 'AdminProductController@getOrders')->name('admin.getorders');
    Route::get('admin/order/{id}', 'AdminProductController@getOrderDetail')->name('admin.order.show');
    Route::get('admin/add-category', 'AdminProductController@addCategory')->name('admin.addCategory');
    Route::post('admin/add-category', 'AdminProductController@submitCategory')->name('admin.submitcategory');
    Route::get('admin/categories', 'AdminProductController@getCategories')->name('admin.allcategory');
    Route::post('admin/categories', 'AdminProductController@getCategoriesAjax')->name('admin.getcategories');
    Route::get('admin/edit-category/{id}', 'AdminProductController@editCategory')->name('admin.category.edit');
    Route::post('edit/categories', 'AdminProductController@categoryEdit')->name('admin.editcategory');
    Route::get('admin/add-blog', 'AdminProductController@addBlog')->name('admin.addBlog');
    Route::get('admin/blogs', 'AdminProductController@blog')->name('admin.allblog');
    Route::post('admin/submitblog', 'AdminProductController@saveBlog')->name('admin.saveblog');
    Route::post('admin/blog', 'AdminProductController@getBlogs')->name('admin.getblogs');
    Route::get('admin/edit/blog/{id}', 'AdminProductController@editBlog')->name('admin.blog.edit');
    Route::post('admin/blog/edit', 'AdminProductController@blogUpdate')->name('admin.blogupdate');
    Route::DELETE('admin/blog/delete', 'AdminProductController@blogDelete')->name('admin.delete.blog');
    Route::get('getsubcate', 'AdminProductController@getSubCat')->name('admin.getSubCat');
    Route::get('markascomplate', 'AdminProductController@markAsComplete')->name('admin.markascomplate');

   
    
    Route::fallback(function () {
        return abort(404);
    });
