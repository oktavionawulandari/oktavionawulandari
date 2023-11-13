<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th scope="col">NO</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Hobby</th>
                <th scope="col">deskripsi</th>
                <th scope="col">aksi</th>
            </tr>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($educations as $education)
                        <tr>

                            <td>{{$no++}}</td>
                            <td style="width: 150px">@if ($education->image)
                            <img src="{{ public_path('/' .$education->image) }}" alt="{{ $education->image }}"class="img-fluid mt-3">
                            @endif</td>
                            <td>{{ $education->judul }}</td>
                            <td>{{ $education->deskripsi }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>