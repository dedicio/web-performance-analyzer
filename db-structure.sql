/**
Create table 'pages' with
    - id
    - title
    - url
    - created_at
    - updated_at
    - deleted_at

use if not exists to avoid error if table already exists
*/
CREATE TABLE IF NOT EXISTS pages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    url TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP
);


/**
Create table 'results' with:
    - id
    - page_id
    - result
    - created_at
    - updated_at
    - deleted_at

use if not exists to avoid error if table already exists
*/
CREATE TABLE IF NOT EXISTS results (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    page_id INT UNSIGNED NOT NULL,
    result TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP
);


/**
Create table 'evaluation_requests' with:
    - id
    - page_id
    - status
    - created_at
    - updated_at
    - deleted_at

use if not exists to avoid error if table already exists
*/
CREATE TABLE IF NOT EXISTS evaluation_requests (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    page_id INT UNSIGNED NOT NULL,
    status VARCHAR(80) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP
);
