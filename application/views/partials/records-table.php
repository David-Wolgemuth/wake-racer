<thead>
    <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Age group</th>
        <th>Time</th>
        <th>Distance</th>
        <th>Gender</th>
        <th>Date</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($records as $key => $value) { ?>
        <tr>
            <td>Rank</td>
            <td><?= $value['name_first']. " " . $value['name_last'] ?></td>
            <td><?= $value['birthdate'] ?></td>
            <td><?= $value['record_time']['formatted'] ?></td>
            <td><?= $value['distance'] ?></td>
            <td><?php if($value['gender']==0){
                echo "Female";
                }
                else{
                    echo "Male";
                } ?></td>
            <td><?php echo $value['record_date'] ?></td>
        </tr>   
    <?php } ?>
</tbody>