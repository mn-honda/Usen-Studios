# マイグレーション
sail artisan make:migration add_information_column_to_users_table --table=users
sail artisan make:migration create_credits_table --create=credits
sail artisan make:migration create_inquiries_table --create=inquiries
sail artisan make:migration create_categories_table --create=categories
sail artisan make:migration create_products_table --create=products
sail artisan make:migration create_images_table --create=images
sail artisan make:migration create_sizes_table --create=sizes
sail artisan make:migration create_product_size_table --create=product_size
sail artisan make:migration create_stocks_table --create=stocks
sail artisan make:migration create_purchases_table --create=purchases
sail artisan make:migration create_carts_table --create=carts
sail artisan make:migration create_sales_table --create=sales
sail artisan make:migration create_deliveries_table --create=deliveries
sail artisan make:migration create_sale_details_table --create=sale_details

# モデル
sail artisan make:model Credit
sail artisan make:model Inquiry
sail artisan make:model Category
sail artisan make:model Product
sail artisan make:model Image
sail artisan make:model Size
sail artisan make:model Stock
sail artisan make:model Purchase
sail artisan make:model Cart
sail artisan make:model Sale
sail artisan make:model Delivery
sail artisan make:model SaleDetail