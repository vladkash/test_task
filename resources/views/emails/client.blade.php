There is a new application for your event!

Sender information:

<table>
    <thead>
        <tr>
            <th scope="row">ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Phone</th>
            <th>Email address</th>
            <th>Education level</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">{{$application->id}}</td>
            <td scope="row">{{$application->name}}</td>
            <td scope="row">{{$application->surname}}</td>
            <td scope="row">{{$application->phone}}</td>
            <td scope="row">{{$application->email}}</td>
            <td scope="row">{{$application->education_level}}</td>
        </tr>
    </tbody>
</table>

