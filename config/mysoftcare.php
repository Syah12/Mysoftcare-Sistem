<?php

return [
    'roles' => [
        'admin'        => 'Admin',
        'staff'        => 'Staff',
        'intern'       => 'Intern'
    ],
    'permissions' => [
        'admin'     => [
            'route' => [
                'dashboardIndex' => 'admin.dashboard.index',
                'attendanceIndex' => 'admin.attendance.index',
                'employeeIndex' => 'admin.employee.index',
                'dutyRosterIndex' => 'admin.dutyRoster.index',
                'roleIndex' => 'admin.role.index',
            ],
        ],
        'staff'     => [
            'route' => [
                'dashboardIndex' => 'admin.dashboard.index',
            ],
        ],
        'intern'     => [
            'route' => [
                'dashboardIndex' => 'admin.dashboard.index',
            ],
        ],
    ]
];
