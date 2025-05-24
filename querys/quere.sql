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
