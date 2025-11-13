--
-- Indexes for table pma__favorite
--
ALTER TABLE pma__favorite
  ADD PRIMARY KEY (username);

--
-- Indexes for table pma__history
--
ALTER TABLE pma__history
  ADD PRIMARY KEY (id),
  ADD KEY username (username,db,table,timevalue);

--
-- Indexes for table pma__navigationhiding
--
ALTER TABLE pma__navigationhiding
  ADD PRIMARY KEY (username,item_name,item_type,db_name,table_name);

--
-- Indexes for table pma__pdf_pages
--
ALTER TABLE pma__pdf_pages
  ADD PRIMARY KEY (page_nr),
  ADD KEY db_name (db_name);

--
-- Indexes for table pma__recent
--
ALTER TABLE pma__recent
  ADD PRIMARY KEY (username);

--
-- Indexes for table pma__relation
--
ALTER TABLE pma__relation
  ADD PRIMARY KEY (master_db,master_table,master_field),
  ADD KEY foreign_field (foreign_db,foreign_table);

--
-- Indexes for table pma__savedsearches
--
ALTER TABLE pma__savedsearches
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY u_savedsearches_username_dbname (username,db_name,search_name);

--
-- Indexes for table pma__table_coords
--
ALTER TABLE pma__table_coords
  ADD PRIMARY KEY (db_name,table_name,pdf_page_number);

--
-- Indexes for table pma__table_info
--
ALTER TABLE pma__table_info
  ADD PRIMARY KEY (db_name,table_name);

--
-- Indexes for table pma__table_uiprefs
--
ALTER TABLE pma__table_uiprefs
  ADD PRIMARY KEY (username,db_name,table_name);

--
-- Indexes for table pma__tracking
--
ALTER TABLE pma__tracking
  ADD PRIMARY KEY (db_name,table_name,version);

--
-- Indexes for table pma__userconfig
--
ALTER TABLE pma__userconfig
  ADD PRIMARY KEY (username);

--
-- Indexes for table pma__usergroups
--
ALTER TABLE pma__usergroups
  ADD PRIMARY KEY (usergroup,tab,allowed);

--
-- Indexes for table pma__users
--
ALTER TABLE pma__users
  ADD PRIMARY KEY (username,usergroup);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table pma__bookmark
--
ALTER TABLE pma__bookmark
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table pma__column_info
--
ALTER TABLE pma__column_info
  MODIFY id int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table pma__export_templates
--
ALTER TABLE pma__export_templates
  MODIFY id int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table pma__history
--
ALTER TABLE pma__history
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table pma__pdf_pages
--
ALTER TABLE pma__pdf_pages
  MODIFY page_nr int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table pma__savedsearches
--
ALTER TABLE pma__savedsearches
  MODIFY id int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: si24i
--
CREATE DATABASE IF NOT EXISTS si24i DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE si24i;
--
-- Database: test
--
CREATE DATABASE IF NOT EXISTS test DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE test;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;