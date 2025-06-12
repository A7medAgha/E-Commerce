create database if not exists uni_pro;
use uni_pro;
-- Table structure for users
create table users (
  id int not null auto_increment primary key,
  name text not null,
  lastname text,
  display_name text,
  email text unique not null,
  password text not null,
  created_at timestamp default current_timestamp
);
-- Table structure for customers
create table customers (
  id int not null auto_increment primary key,
  first_name text not null,
  last_name text not null,
  email text unique not null,
  phone text,
  created_at timestamp default current_timestamp
);
-- Table structure for products
create table products (
  id int not null auto_increment primary key,
  name text not null,
  description text,
  price decimal(10, 2) not null,
  stock_quantity int not null,
  created_at timestamp default current_timestamp
);
-- Table structure for orders
create table orders (
  id int not null auto_increment primary key,
  customer_id bigint,
  order_date timestamp default current_timestamp,
  status text not null,
  total_amount decimal(10, 2) not null,
  foreign key (customer_id) references customers(id)
);

-- Table structure for order_items
create table order_items (
  id int not null auto_increment primary key,
  order_id bigint,
  product_id bigint,
  quantity int not null,
  price decimal(10, 2) not null,
  foreign key (order_id) references orders(id),
  foreign key (product_id) references products(id)
);

-- Table structure for categories
create table categories (
  id int not null auto_increment primary key,
  name text not null unique
);

-- Table structure for product_categories
create table product_categories (
  product_id int,
  category_id int,
  primary key (product_id, category_id),
  foreign key (product_id) references products(id),
  foreign key (category_id) references categories(id)
);

