Tasks
==
- [x] Database System - [0.2](https://github.com/ashrafulamin/autoattend-practice/commit/b99feb217013c1d6f72165e1922ab5aff8eabf62)
- [x] Check device from database list - [0.3](https://github.com/ashrafulamin/autoattend-practice/commit/ea0f56eefe803289cca8347651291d16ca9f8f56)
- [x] Update attendance after device check - [0.4](https://github.com/ashrafulamin/autoattend-practice/commit/81aa6b2aa177ba460270bc963223cae5830a4fce)
- [x] New user & device add form - [0.5](https://github.com/ashrafulamin/autoattend-practice/commit/0d4e907388276724b361b8cc4ece82c70799140c) 
- [x] User Profile Edit - [0.6](https://github.com/ashrafulamin/autoattend-practice/commit/400dafcdf76ddd441be6e106effac45e33eb4645)
- [x] Users Listing - []()
- [x] Attendance View by Date - []()
- [x] User View (Basic Info & Attendance by Month) - []()
- [ ] Leave Applications - []()


Phases
==
- May 28	-	Phase 1 Progress
- June 20	-	Phase 1 Follow-up 1
- July		-	Phase 1 Follow-up 2
- October	-	Phase 2 Follow-up 1
- December	-	Phase 2 Follow-up 2
- December	-	Final


Views
==
- [x] Login (username & password) - *User/Admin*
- [x] Dashboard - *User/Admin*
- [x] Add User - *Admin*
- [x] Add Device - *Admin*
- [x] Edit Profile - *User/Admin*
- [ ] Leave Application - *User/Admin*
- [x] User List - *Admin*


Tables
==

###### users
1. id *(int 15, ai, primary)*
2. name *(var 255)*
3. email *(var 191, unique)*
4. password *(var 255)*
5. role *(var 10)*

###### devices
1. id *(int 15, ai, primary)*
2. name *(var 255)*
3. mac_add *(var 20, unique)*
4. user_id *(int 255, index)*
5. last_seen *(timestamp)*

###### attendance
1. date *(date)*
2. user_id *(int 15, index)*
3. in_time *(timestamp)*
4. out_time *(timestamp)*

###### leave_applications
1. id
2. user_id
3. type
4. date_start
5. date_end
6. desc
7. status