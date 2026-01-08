<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #34495e;
        }

        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background: #34495e;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #2c3e50;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-warning {
            background: #f39c12;
            color: white;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .stat-card h3 {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            background: #ecf0f1;
            border-bottom: 1px solid #bdc3c7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            color: #2c3e50;
            font-size: 20px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #34495e;
            color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #ecf0f1;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button {
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .search-bar {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            font-size: 14px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            padding: 20px;
            background: #34495e;
            color: white;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            background: none;
        }

        .close:hover {
            color: #bdc3c7;
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .form-group small {
            display: block;
            margin-top: 5px;
            color: #7f8c8d;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .required {
            color: #e74c3c;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>📚 Enrollment System</h2>
        <nav>
            <a href="#" class="active" onclick="showTab('dashboard')">📊 Dashboard</a>
            <a href="#" onclick="showTab('students')">👨‍🎓 Students</a>
            <a href="#" onclick="showTab('courses')">📖 Courses</a>
            <a href="#" onclick="showTab('enrollments')">✅ Enrollments</a>
            <a href="#">📈 Reports</a>
            <a href="#">⚙️ Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Tab -->
        <div id="dashboard" class="tab-content active">
            <div class="header">
                <h1>Dashboard</h1>
                <input type="text" class="search-bar" placeholder="Search...">
            </div>

            <!-- Statistics -->
            <div class="stats-container">
                <div class="stat-card">
                    <h3>TOTAL STUDENTS</h3>
                    <div class="number">1,245</div>
                </div>
                <div class="stat-card">
                    <h3>TOTAL COURSES</h3>
                    <div class="number">48</div>
                </div>
                <div class="stat-card">
                    <h3>ACTIVE ENROLLMENTS</h3>
                    <div class="number">3,567</div>
                </div>
                <div class="stat-card">
                    <h3>COMPLETED COURSES</h3>
                    <div class="number">892</div>
                </div>
            </div>

            <!-- Recent Enrollments -->
            <div class="card">
                <div class="card-header">
                    <h2>Recent Enrollments</h2>
                    <button class="btn btn-primary">View All</button>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Math 101</td>
                                <td>2024-01-15</td>
                                <td><span class="badge badge-success">Enrolled</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>English 101</td>
                                <td>2024-01-16</td>
                                <td><span class="badge badge-success">Enrolled</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Mike Johnson</td>
                                <td>Physics 101</td>
                                <td>2024-01-17</td>
                                <td><span class="badge badge-warning">In Progress</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Students Tab -->
        <div id="students" class="tab-content">
            <div class="header">
                <h1>Students Management</h1>
                <button class="btn btn-success" onclick="openModal('studentModal')">+ Add Student</button>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>All Students</h2>
                    <input type="text" class="search-bar" placeholder="Search students...">
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>STU001</td>
                                <td>John Doe</td>
                                <td>john@email.com</td>
                                <td>+1234567890</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('studentModal')">Edit</button>
                                    <button class="btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU002</td>
                                <td>Jane Smith</td>
                                <td>jane@email.com</td>
                                <td>+1234567891</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('studentModal')">Edit</button>
                                    <button class="btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Courses Tab -->
        <div id="courses" class="tab-content">
            <div class="header">
                <h1>Courses Management</h1>
                <button class="btn btn-success" onclick="openModal('courseModal')">+ Add Course</button>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>All Courses</h2>
                    <input type="text" class="search-bar" placeholder="Search courses...">
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course Name</th>
                                <th>Instructor</th>
                                <th>Credits</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CS101</td>
                                <td>Introduction to Computer Science</td>
                                <td>Dr. Smith</td>
                                <td>3</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('courseModal')">Edit</button>
                                    <button class="btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>MATH101</td>
                                <td>Calculus I</td>
                                <td>Dr. Johnson</td>
                                <td>4</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('courseModal')">Edit</button>
                                    <button class="btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Enrollments Tab -->
        <div id="enrollments" class="tab-content">
            <div class="header">
                <h1>Enrollments Management</h1>
                <button class="btn btn-success" onclick="openModal('enrollmentModal')">+ New Enrollment</button>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>All Enrollments</h2>
                    <input type="text" class="search-bar" placeholder="Search enrollments...">
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Enrollment Date</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Math 101</td>
                                <td>2024-01-15</td>
                                <td>A</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('enrollmentModal')">Edit</button>
                                    <button class="btn-danger">Drop</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>English 101</td>
                                <td>2024-01-16</td>
                                <td>B+</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td class="actions">
                                    <button class="btn-primary">View</button>
                                    <button class="btn-warning" onclick="openModal('enrollmentModal')">Edit</button>
                                    <button class="btn-danger">Drop</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Modal -->
    <div id="studentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Student</h2>
                <button class="close" onclick="closeModal('studentModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Student ID <span class="required">*</span></label>
                        <input type="text" placeholder="e.g., STU001" required>
                        <small>Unique identifier for the student</small>
                    </div>

                    <div class="form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" placeholder="student@email.com" required>
                    </div>

                    <div class="form-group">
                        <label>Phone <span class="required">*</span></label>
                        <input type="tel" placeholder="+1234567890" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea placeholder="Enter address (optional)"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status <span class="required">*</span></label>
                        <select required>
                            <option value="">Select status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('studentModal')">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Course Modal -->
    <div id="courseModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Course</h2>
                <button class="close" onclick="closeModal('courseModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Course Code <span class="required">*</span></label>
                        <input type="text" placeholder="e.g., CS101" required>
                    </div>

                    <div class="form-group">
                        <label>Course Name <span class="required">*</span></label>
                        <input type="text" placeholder="Enter course name" required>
                    </div>

                    <div class="form-group">
                        <label>Credits <span class="required">*</span></label>
                        <input type="number" min="1" max="6" placeholder="3" required>
                    </div>

                    <div class="form-group">
                        <label>Instructor <span class="required">*</span></label>
                        <input type="text" placeholder="Enter instructor name" required>
                    </div>

                    <div class="form-group">
                        <label>Status <span class="required">*</span></label>
                        <select required>
                            <option value="">Select status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('courseModal')">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enrollment Modal -->
    <div id="enrollmentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>New Enrollment</h2>
                <button class="close" onclick="closeModal('enrollmentModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Select Student <span class="required">*</span></label>
                        <select required>
                            <option value="">Choose a student</option>
                            <option value="1">John Doe (STU001)</option>
                            <option value="2">Jane Smith (STU002)</option>
                            <option value="3">Mike Johnson (STU003)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Course <span class="required">*</span></label>
                        <select required>
                            <option value="">Choose a course</option>
                            <option value="1">CS101 - Introduction to Computer Science</option>
                            <option value="2">MATH101 - Calculus I</option>
                            <option value="3">ENG101 - English Literature</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Enrollment Date <span class="required">*</span></label>
                        <input type="date" required>
                    </div>

                    <div class="form-group">
                        <label>Status <span class="required">*</span></label>
                        <select required>
                            <option value="">Select status</option>
                            <option value="enrolled">Enrolled</option>
                            <option value="completed">Completed</option>
                            <option value="dropped">Dropped</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" placeholder="e.g., A, B+, C (optional)">
                        <small>Leave empty if course is in progress</small>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('enrollmentModal')">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Enrollment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.remove('active'));

            document.getElementById(tabName).classList.add('active');

            const links = document.querySelectorAll('.sidebar nav a');
            links.forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }

        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
            }
        }
    </script>
</body>

</html>