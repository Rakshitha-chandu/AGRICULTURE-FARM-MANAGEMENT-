

-- Create buyer table
CREATE TABLE buyer (
    bid INT AUTO_INCREMENT PRIMARY KEY,
    bname VARCHAR(255) NOT NULL,
    busername VARCHAR(255) NOT NULL,
    bpassword VARCHAR(255) NOT NULL,
    bemail VARCHAR(255) NOT NULL,
    bmobile INT NOT NULL,
    baddress VARCHAR(255) NOT NULL
);

-- Create farmer table
CREATE TABLE farmer (
    fid INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    fusername VARCHAR(255) NOT NULL,
    fpassword VARCHAR(255) NOT NULL,
    femail VARCHAR(255) NOT NULL,
    fmobile INT NOT NULL,
    faddress VARCHAR(255) NOT NULL
);

-- Create fproduct table
CREATE TABLE fproduct (
    pid INT AUTO_INCREMENT PRIMARY KEY,
    fid INT NOT NULL,
    product VARCHAR(255) NOT NULL,
    pcat VARCHAR(255) NOT NULL,
    pinfo VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    FOREIGN KEY (fid) REFERENCES farmer(fid)
);
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    bid INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (bid) REFERENCES buyer(bid),
    FOREIGN KEY (product_id) REFERENCES fproduct(pid)
);

CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    bid INT,
    product_id INT,
    review_text TEXT,
    rating INT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bid) REFERENCES buyer(bid),
    FOREIGN KEY (product_id) REFERENCES fproduct(pid)
);

