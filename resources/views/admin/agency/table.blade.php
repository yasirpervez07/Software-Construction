@forelse ($agencies as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->image }}</td>
                                    <td>{{ optional($item->user)->name }}</td>
                                    <td>{{ optional($item->areaOne)->name }}, {{ optional($item->areaTwo)->name }},
                                        {{ optional($item->areaThree)->name }}</td>
                                    <td>{{ $item->major_area }}</td>
                                    <td>{{ $item->minor_area }}</td>

                                    <td>{{ optional($item->user)->phone }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->verified == 1)
                                            <span class="badge badge-pill badge-success">Verified</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Not Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('agencies.edit', $item->id) }}" class="float-left"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('agencies.destroy', $item->id) }}" method="POST">
                                            @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                    class="fas fa-trash-alt"></i></button> </form>
                                    </td>
                                </tr>
                            @empty
                                <p>No Data Found</p>
                            @endforelse
