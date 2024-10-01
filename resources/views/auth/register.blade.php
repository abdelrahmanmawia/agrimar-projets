<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url(images/grass.jpg) no-repeat;
  background-size: cover;
  background-position: center;
}
.wrapper{
  width: 420px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(9px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
}

.wrapper .select-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
}

.select-box select{

  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 16px;
  /* color: #fff; */
  padding: 20px 45px 20px 20px;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  text-decoration-color: #fff;
}

.select-box select::-ms-expand {
  display: none;
}

.select-box select::placeholder{
  color: #fff;
}

.select-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;
}

.select-box option{

  overflow: ;
}


.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: #fff;
}
.input-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;

}

.wrapper .remember-forgot{
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}
.remember-forgot label input{
  accent-color: #fff;
  margin-right: 3px;

}
.remember-forgot a{
  color: #fff;
  text-decoration: none;

}
.remember-forgot a:hover{
  text-decoration: underline;
}
.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
.wrapper .register-link{
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;

}
.register-link p a{
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover{
  text-decoration: underline;
}
  </style>
</head>
<body>
  <div class="wrapper">

    <form action=" {{ route('register.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <h1>sign up</h1>

      <div class="input-box">
        <input type="email" placeholder="Email" name="email" autofocus>
        <i class='bx bxs-envelope'></i>
        @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="input-box">
        <input type="text" placeholder="fullname" name="fullname" autofocus >
        <i class='bx bxs-user'></i>
        <div>
            @if ($errors->has('fullname'))
                <span class="text-danger text-left">{{ $errors->first('fullname') }}</span>
            @endif
        </div>
      </div>

      {{-- <div class="form-group mb-3">
        <label for="image">Image</label>
        <input type="file" name="profile_image" id="image" class="form-control">
    </div> --}}
    <div>
        @if ($errors->has('profile_image'))
            <span class="text-danger text-left">{{ $errors->first('profile_image') }}</span>
        @endif
    </div>
      <div class="input-box">
        <input type="text" placeholder="Phone" name="phone"  autofocus >
        <i class='bx bxs-phone'></i>
        <div>
        @if ($errors->has('phone'))
            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
        @endif
        </div>
      </div>

      <div class="input-box">
        <input list="regions" name="region_id" placeholder="region" autofocus>
        <datalist id="regions">
            @foreach ($regions as $region)
                <option value="{{ $region->name }}">{{ $region->name }}</option>
            @endforeach
        </datalist>
        <i class='bx bxs-map'></i>
        <div>
        @if ($errors->has('region'))
            <span class="text-danger text-left">{{ $errors->first('region') }}</span>
        @endif
        </div>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Password" name="password" autofocus >
        <i class='bx bxs-lock-alt' ></i>
        <div>
        @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
        </div>
      </div>

      <button type="submit" class="btn">sign up</button>
      <div class="register-link">
        <p><a href="{{ route('login') }}">Go Back</a></p>
      </div>





    </form>
  </div>
</body>
</html>
