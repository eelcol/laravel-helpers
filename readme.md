# Added macro's

## Uploaded file

- Directly save an uploaded file to the cloud. A new method `saveToCloud` is added to `Illuminate\Http\UploadedFile`.

`string saveToCloud(string $folder, string $disk = null)`

This method returns the URL of the file. When the file is saved to a local disk, a relative path is returned in stead of a complete URL.

# Helper functions:

- safe_array(array, ...keys)
Retrieve a key from the array, when you do not know for sure that $array is really an array. Can be used with multiple levels:
safe_array(array, level1, level2, etc)

- safe_in_array(val, array)
Check if a value is in array, when you do not know for sure that $array is an array

- id_in_collection(id, collection)
Check if an ID is present in a Eloquent collection

- error(msg)
Present an error message

- success(msg)
Present a success message

- display_messages()
Display the messages in HTML. In Blade, use: {!! display_messages() !!}

- display_success(msg)
Directly display a message in HTML. In Blade, use: {!! display_success('text') !!}

- display_error(msg)
Directly display a message in HTML. In Blade, use: {!! display_error('text') !!}

Messages can also be added by setting a session with key 'status'. This message will be printed as a success message.