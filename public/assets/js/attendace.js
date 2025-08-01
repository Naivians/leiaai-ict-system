$("#attendanceTable").DataTable({
    processing: true,
    serverSide: true,
    columns: [
        {
            data: "users_name",
            name: "users_name",
        },
        {
            data: "position",
            name: "position",
        },

        {
            data: "time_in",
            name: "time_in",
        },
        {
            data: "time_out",
            name: "time_out",
        },
        {
            data: "designation",
            name: "designation",
        },
        {
            data: "total_hours",
            name: "total_hours",
        },
        {
            data: "status",
            name: "status",
        },
    ],
});
