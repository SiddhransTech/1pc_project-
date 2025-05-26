-- Step 1: Add the foreign key columns to the Member table
ALTER TABLE member
ADD COLUMN area_id INT,
ADD COLUMN legion_id INT;

-- Step 2: Add foreign key constraints
ALTER TABLE member
ADD CONSTRAINT fk_member_area
FOREIGN KEY (area_id) REFERENCES areas(id),
ADD CONSTRAINT fk_member_region
FOREIGN KEY (legion_id) REFERENCES legions(id);



--  added the relation tble of admin area and legion admina 

-- Step 1: Convert admin table to InnoDB (to support foreign keys)
ALTER TABLE admin ENGINE=InnoDB;

-- Step 2: Make sure areas table is also InnoDB
ALTER TABLE areas ENGINE=InnoDB;

-- Step 3: Create admin_area table with foreign keys
CREATE TABLE admin_area (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    area_id INT NOT NULL,
    UNIQUE(admin_id, area_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (area_id) REFERENCES areas(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;



CREATE TABLE admin_legion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    legion_id INT NOT NULL,
    UNIQUE(admin_id, legion_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (legion_id) REFERENCES legions(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
