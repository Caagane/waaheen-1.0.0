CREATE TABLE users (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    social_id text,
    f_name varchar(225),
    l_name varchar(225),
    gender varchar(25),
    country varchar(50) NOT NULL,
    city varchar(225) NOT NULL,
    phone int(50) NOT NULL,
    email varchar(225),
    image varchar(225),
    type varchar(225),
    login_type varchar(25),
    plan varchar(25),
    subscription_period DATE DEFAULT NULL,
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW()
);
CREATE TABLE clients (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    client_id int(50),
    com_id int(50),
    UNIQUE `unique_client`(`client_id`, `com_id`),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (client_id)  references users (id) on delete cascade,
    FOREIGN KEY (com_id)  references users (id) on delete cascade
);
CREATE TABLE com_info (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    com_id int(50),
    role varchar(225),
    role_desc varchar(225),
    is_delivery varchar(25),
    delivery_desc varchar(225),
    address varchar(225),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (com_id)  references users (id) on delete cascade
);
CREATE TABLE subscription (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    com_id int(50),
    send_from varchar(225) NOT NULL,
    send_to varchar(225) NOT NULL,
    plan varchar(225),
    period varchar(225),
    is_accepted varchar(25),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    UNIQUE `unique_subscription`(`com_id`, `create_at`),
    FOREIGN KEY (com_id)  references users (id) on delete cascade
);
CREATE TABLE products (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    com_id int(50),
    p_name text,
    p_desc text,
    p_price double,
    p_img varchar(225),
    category varchar(225),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (com_id)  references users (id) on delete cascade
);
CREATE TABLE visitors (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    client_id int(50),
    com_id int(50),
    p_id int(50),
    create_at DATE DEFAULT NULL,
    update_at DATE DEFAULT NULL,
    FOREIGN KEY (com_id)  references users (id) on delete cascade,
    FOREIGN KEY (client_id)  references users (id) on delete cascade,
    FOREIGN KEY (p_id)  references products (id) on delete cascade
);
CREATE TABLE carts (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    p_id int(50),
    client_id int(50),
    quantity int(50),
    is_complete varchar(25),
    create_at DATE DEFAULT NULL,
    update_at DATE DEFAULT NULL,
    UNIQUE `unique_index`(`p_id`, `client_id`),
    FOREIGN KEY (p_id)  references products (id) on delete cascade,
    FOREIGN KEY (client_id)  references users (id) on delete cascade
);
CREATE TABLE products_likes (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    p_id int(50),
    user_id int(50),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    UNIQUE `unique_index`(`p_id`, `user_id`),
    FOREIGN KEY (p_id)  references products (id) on delete cascade,
    FOREIGN KEY (user_id)  references users (id) on delete cascade
);
CREATE TABLE messages (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    sender int(50),
    reciever int(50),
    message text,
    msg_from text,
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (sender)  references users (id) on delete cascade,
    FOREIGN KEY (reciever)  references users (id) on delete cascade
);
CREATE TABLE notifications (
    id int(50) PRIMARY KEY AUTO_INCREMENT,
    my_id int(50),
    noti_id int(50),
    noti_type varchar(25),
    view varchar(25),
    create_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (my_id)  references users (id) on delete cascade
);