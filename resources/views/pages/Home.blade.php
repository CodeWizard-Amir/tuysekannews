@extends('layout.Mainlayout')
@section('body')
@include('layout.Header')
{{-- آثار section --}}
<section class="2xl:w-[75%] lg:w-[90%] w-full mx-auto mt-[200px] flex flex-col justify-center items-center">
    <h2 class="text-xl my-5 font-bold">آثار تویسرکانی ها</h2>
    <div class="flex flex-wrap justify-between w-full items-center">
        @for ($i = 0; $i < 3; $i++)
        <div class="2xl:w-[30%] md:w-[45%] lg:w-[40%] w-full p-2 rounded-md m-5 h-96 shadow-md border">
            <img class="w-full rounded-md h-2/3" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMVFhUXFxgYFxgYGBoaGhgXGhoeGB4YFxsaHigiGhslGxgXITEhJSkrLi4uGB8zODMtNygtLisBCgoKDg0OGhAQGi0dHR0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLS0rLS0tLS0tLS0tLS0tLS0tKy0tLS0tLS0tK//AABEIAMIBAwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAADAQIEBQYAB//EAEwQAAECBAMFBQUEBgYIBwEAAAECEQADITEEEkEFUWFxgQYikaGxEzLB0fAHQuHxFCNScoKSFTNiorLSFkNjc4OTwtMkJURFU1TiF//EABgBAAMBAQAAAAAAAAAAAAAAAAABAgME/8QAJxEAAgICAgICAQQDAAAAAAAAAAECEQMSITETUTJBIwQiUmEzQpH/2gAMAwEAAhEDEQA/ALVKKV+n/MwYJdj9P9COmJbl8NIbYML6fL63CO+XKs4o8OiQlDJA1fxr+fnHIDNo9Pw9I6WBrv8AItWsPlp31Y+Yjkn9nTEatIvuCh1uIGpH10+UGWptxL9dz8QPjApmnAfh4w4PgUlyJLRXo/l8wI4DvcaQ9QBSeFPT8YapNuFDD2tsNaRFnoGYnl9eUJLoDvDn0bzjpyqkdfrxhNDujdu8ZjX5BigSEvu+N4YpFvL1h8uXpuPi9YRS2/mHnT4wkqx0Df5B2WosPz/CCmpTupDJktw31rB0ytBZw3iIiXyb/ouPMUDAofrSI+WJs1FH3wDLHRi6s583dAckcoAXLc4MWFVEAC5NgN8WOwcD7UlYSSCM0rMPuC+jBatHqBa8Rn/URxcfbMKbdIqlS2LQmWLDaUr9aur9425t6vEfJG0JbRT9hRHCIcEQbLHZYoKBNChMFCYUIgECyiHhMFCIcEwWOgQlQ8S4IEw8IibCgWWFA4QUJEObhCsKBBEOygQTJChEFjoF4x0Gyx0AgE1FebfXmIYUcL1/H0gyh3n5ekKU0puHz+cc8XwjtkuWNTUA6/i3h8oKlIKbmoLtyb5QyUCIVRahGoPQn4nLGOVUa43YzN3hoxp9bnaGTPePGnI/TQ4K7yWsfCCTE1azq+uURF8GjRHlq95xu+fwIjkh3108meFSjfc/nCJSTmPhy39aw0JkaZ5knyP4QqEOG+qx2Sj8e7wepP1xgqaB+EdK/wAZzP5kWSkuSdW+vF4biBUcx5GCy0d4new8B9COxYgT/Ywa/Ijp6aK5H/CYkzAcpY/s+BUDDCzg6a+ItEkig/eHlWMsnbNcfSBLFgdKGA5IlqECyx04nwc2ZclVtqSFS8hLZlJc7kguo/yg9SBrF7sbaDqE5ZYJQfZIAYBIolIYakAkmwQN8RVSEkhRSCQ4BOjs7eA8IJkjny/pfJkU5PhfRitk++BcWUkukMLcyPvdXtAQmJATTr6/lCNHTFKKpfQ2gOSFCYNlhckVYqAtChMGCOEOyQWFAQiHJEFEsQ5oVjoEEw8S4eBDgmFYUMSiHNDwiHhMKx0By8IXJBssc0AUA9nHQbLHQWBFULcvr0hzWHWAI0ALqNedvnEkHyjnTOxoa0Rpym53TxpbnaJhiNOLVAdjbhY+XpCy8oePhgZai3EHx4+UHzVL3NepOnCAql5QkDiPnpy8YXLU0sAGHifURzxNpD0qoTuJ+H4wwJo+tfDRo7MEgvuc9bCFzMlLG7D5xaZLQyYhgkaCnzjlmhG/01gqkC92cDnCZAQ+or0jojLijCUebIMkkr+v7R+ELtMslRH7JaOwyCJiqFkhjuO71MSsfLdD7g/hWCPxaFL5JgSqiCN6PMhPqRBiLDR/gR8BEdR/VOHGXLzYKiTPJdFLu3go/GM2aoKlFI4IhZIpeChMbYn+058vyBhMdkguWBAuaCm/5RUpqPZEYOXQhNQGJd+jan06w/LEzDoFDThrEoyEK0biIxWdWavA6KoIhQmJszAEWqOF/CAhEaqafRk4NdgWjgiD5IXJFWKgARDgmDBMLlgsKBBMKEwYIhQiFYUCCYcEwQJhzQrHQPLHZYJCFMFhQJo6H5OAhYLFRTSUsBVgBSDgvWwuwuRAMQrdqARuPLqa9YKhLfeZqeNA/j5RhFnZJEkViPMQb9D9dYfOWQGBD5XbgICud8/hFyIiwSVuQnifEB2ffRQ8IXCqcvZwPRn8A/jERcvuKIapPz+R6QbFTlJSDZ00A4qbW3dB6RyXTOirQiQwOpILPuTT8IKu6BRwD5AP6+UAxYAQ5r3CBuFKfCCKSyLEFso1IA+N/oRcXQpIcFEggWBYb3+MTpMth9eMCwEmz6Cg+JP14QXae0JchHtJpITSrEs9BYRtH2Yy9IrJsxlzUvXuEDqfn5RPnJ7ttIymO7YYb2mZAWq1kkcW7zQLG9vAUsiQrc6lgeQB9YanHkThLg0CnVKBp3gmmlw/qrwixxDZg76inJulCfKPPf8ASmctAQES0hNveUfUW5QmM7RYpTEzAnLbKgDhqDvjPY01PR5CQ1Ih7W2oiQADVRskep3CPMJm2MQt3nzeiyn/AAtERRJqSVE6kknzivI0qRLxW7ZvVdokk9+ahOrPSHjtLITX2pIawQov1b4xg8OgF3LW84mvQ15D6EZO2aJJG0HbaULSpppqEp9S/lEWf9oMxJIRhk81zD6BPxjLJmcyG5c+kclhpC1G2X//APQ8aTREhIrQIUo+avhFp2Pm4zHYhXtMUUZUhTJlywkh2LjK5uNd8Y5K9GjW/Y/iFfps9CkZWlUU7hQK01EOqQuzcztk4hFky5o3oVkP8q3H9+IS5wT/AFgVKP8AtAUjor3T0MarZsuayjNyPmVlCQ3czHK51JSxMSZiRV9d9RAsskTLFFmSAhYvp+x5Ci4QEnUyyUeIFD1iArY6ge5MSobpgY/zpp/djVZvZm8D+mQBC5YOqUpJIUnKeYII3gj4gQoEabWZuNAgiHCXBAIcBBYJDAiOywUCOIhWOgOWOgjR0FhRjVzSSkpFHetbE04s58B0n43EJlysymA7oq28U4ngN0ZqdtEgpSAaXqQzlyDxOp09Ys3a8yZKKGcFgDqz1bd96ujxhGaR1SxtmrM9KkO5IdiWNAbsbcIilbKAWWegNn415RX4THryZM1Cw0FG5cYRWPVdSycpUHo3Fyehi/IiVjZKSTmmJajJS+gLqyn+60Lhl94kqfvJSnc5Fh/LFPMxSkqUkO6gC4FGS5LixbMQw3xIwc9ToFsqVVa5JIzPvABHhujCUlZqosscYpksdFhjod/QE6RJw5GTiS1bkvbp8IrMZic65aM1HqN1CCd9oEcWpRJCmyuQ+hO708YFJWGjo02HmnMpRo5Hd3c+nxit7aJKsJNO7L17wtwisTjmyh2YZlFmrvpck6nfDdtbRJw0xBZiniTQg8vzjTyLojxvsyKglIcJQ8RpszMwLDlBFJRQknpAyhDGhhkiJGTMUsCx9ILhgqYn3yQ1bCABDjWC4AUAFNLwVYWLNwJ0JFtYJh8CBcvzekSpckggki44/XhCzqqJoLQtUVZHmIA0B+EME0Gh4weYSzBoioQS7A+EHQD05yefnDMQhQ1I5fnDs6k0t0hVKCmLno9oLFRHRzd43n2TqJxUxIN5J/xIjCTSlNcqqtxH4GNP9n235OFxJmTQoI9mUuEk1JSwYV0MJtAkz3MyykVbpDMzgXhmHxSZiErRVK0pUNKKDhxoWMQtvzpiZEz2CgmaEdwqDgK4jdEdFVZbZnFSOogVGoz1q8eSYvtjtWXImT/aYKbLl5nIQt+6rKRcVd49B7G7Wm4nBS580JClFThIYUUQGBJO6EmmNxaCbZxKEFOdaU01IDxWHasgf61HiIqO3+Ple1QgqGdKTmAuMzEPzEZtGLSiZlKTmBAY76N6iOiMkkYODbPQpeNlGomI/mEBm7ZkJvMB/dBPoIwmL2uiZMJAyEkBkhhmYDzNesRF7QSlTKehY1sxYsXYw9oi0Z6GO0GH/aP8p+UcrtBh/wBo9EmMHi9pI9olKErTQAhR+9wJsLXO+AYnaiBLJzKC8yg1ClkgvX+WopXrC3iPSR6H/T0j9s/ymOjy9G05hAL3joe0Q0YOUtQcuO8WYvwrbe7x0mgABDg8Xyt+MMCySSAdepcpD9RDczElNnqOlD5tHDZ3UTpM1zZ3FOfEwqZrhSSanTfobxWYJT3oQovXg9OrnpFqhKbAZjQUpW7nTWEBD9s6kkKsGJ3KAAIO53HiInzcQyUAXPtOfdKX4XURFflzKD94KzUBy5SAkur6qx4w+WjuyidDMAu9Qh9a+6YbYiXIxPfzKck5rM4plYeMR8XPIILsGbppFZOxgTNKE7gSasw+NvGFOICiM1N27dCGSZOOJWag3vTUUiVijmo9FUPH6aM5h533gRpv6msSJ+02SCDWpe24QUOyTiMKkEAU3l7wEIDXAhhmZwCou9XFXhZRT7rk/XKOnH8TmyfIU4cXzC1vow3CT6Bkg8IUgudwgWHxZAbcWZo0ICL21KFM6PGGntBJb+sT4H4CMrtDDhU5nCXJqSwHOA7VlJSoBKkKGUe4XFhq13eIsujdCeFJBBooAjka6ww4legpygOzin2Ep7+zT6NuicJWoJ8PwihERZWWpqNLCDql0djDluLP4P8ACGoWrUnw8hSARcdnuz/6QmYSrKEFBNKkKzCnhBe02x0ySgISwyuauSQbmLTsBM7uJqbSm01VwgHbmYSuVXQ68YmuR3wendnUH9Dw5/2Uv/CIj9rsUZeBxS0pZaZCyDxa8SOzAUcHhv8AdI9Ij9ssKTgMWACpRkTGCQ6icpoBqYljXZ4PsLaJOB2hhyffle2STUuCBMHXu9STHtP2aqfZ8rmqnWPBv6HxMuUuYZM1KBLUlRWkJZKgxdJVmdwNNI90+y5/6PljV1eoiUuS59GK+0JDbQnKpUIpuPs02ijlzP1qQDQTQ4P7wtGo7eYSX+mrWtTOEAgqKX7gbKWZ2G+KzD4FGYLFXUC/eoX4isS5q6FXBmkT3J171PHdCr2diVF0S5ixX3ZZI8XaLDtCuVJS6UATVnKmpIoaltQPiIz47z5iVMwYqJJ1JrvjSHKsznKuD1zAmUmXLCsK6ghAU6Ee8BUuVA31cxQdscFOxKUCRhsgSFhguSCXy1bO2+MpgxJUT+rQjc4BHjliTMwiQHzSiRYJFTw92vWNW74MlKhJXZzHpASMOth/tJH/AHI6GlSh9xP8o+UdE6huwkovLAPve6pX7qMwPF38XrRobUS1EgOzjdUkN0HpE+dISkIJLDWgFwoePe8BFfj54XKIR91TdKkeTX4xxI7weAIUvK28A6uA7X3OYLh1KSEkuT3XO7u8OQ/miLsGVmmFnooPWhL2NhraJc7OMqAalAuCSVNd9+VJ8of2ILPmISlyRmCg1rKcX5ARBxeOCZMgAVIUu5qSopBY2oIXa+y5nsgySVFCLGykUsTXuqI/hhcZs2ZMVlDMmVLSk00S6gQ9GrprDtCsrMFVc0mpIZ3poPgIJISE1URRKR4kCnWLHBbFUgKV3SkgNc7q0HKJcvs2Jl5hBOWgBNXcA9Xg2Q0Y7CYj30ipSkkcWIA4awu0VJTLRyKW3lswPJiY2GG7BpSVBU4jOGokBnINHPCzRDPYiUbz+6rvaON2u5x1pFbRFTKHZCiUOeAZ9GvFjJIKhTziSNlSJckKROK3IBGYWa7Af2fOIjpFAY6MfMTDJwyZ7L6cxCwklRc82qYOwa8QJDuecaEFBt0d7qr1isi129738SoqozfZaNjs0kyUVpkEXyCWF7RT7CUj9HluKsa9TFoFK4sLWhgctR3n66QP2uj+nyjpiyRWsCKDDA3P2czHGKD/AHZR8Fn5xG7coGaUb0PqIT7N/exINP1SfKYPnBO20sASy5+9fmG0hfYmeldk1H9Cw/8Auk+kSdoHuL/dPpeIXY0lWBw/7g9T8ostooZCte6adIzkUjzXttLIwOJJAA9mfH+GkaP7Lph/o+XT7yq+EUHblT4DEnUyz4cX0pF59k6v/Lka99VOgjPGzSa4Mf8AaPtGcjGrEvJVKCCpTEd0aNWMxhMXOKwqdOOXMk5QlISkg3fK5DcI132h7HnTsYuZLlKUClDqCVKSWSAwaMFteRPw6gpclSZTHMMqk8ACpQIFW0jPlypGau+ejTHE4SZQYfDzMourOSxLv7++K4bbwwts5H/KX/njK4TbSZa84QbEe+LHkgbhEhPaKWC/s6sBcG0dsOuSJpX+3o0KO0kkf+3oH/Bmf5onYTbEpYJGCkpb9qWtL8nNYyKu0qDeWp97h7Nv3GFn9pEKlGXkWHCgDT7wbfFWTRq/9IpH/wBXDeP/AOo6MKMcnj/d/wC5HRG8v4nQsWD+T/4eibXwUpUvKonIk071coyipeocq8ILLlSgQGSASGDVJB30uGD6uYyWN7RzM7KCQwKSkioq7EeTGIOJ25OWQsKLoYpYWPQUFLmONQZbkjfmXLQoBGUOOAFNb0anjAcRjZbgKnIQQ5UXFQz77t1jzDF4wqJzKJJ1D184ima/vetWili/slzPWcPtXBIRmXNcEOwNjpQDz4RQ4/twlx7JLioqGcMQ441eMF7Tm0Hlzpb94LPURaxRJ3NDtDtpOmICAlKQNRrRrCKbD7XnJIKFqo7AF78Dzh0nEYcfd/mD/OJacWg2UnxAi1CJOzALx2JXdczg5bhABKnftkdfkYsI4jlF6oLZG2dhAFvmckEWb6tFmZPGICieEORO3iLjSM5WTJcoA963CB4OZU8zAFTucBlz2fm8VaEV+2z3z+8YrQIn7VdUxTAkPHbPElNZyZpL2RlYj+KMZGiRoez0wDDocP73+IxbpUTZ2MU0j2JQPYhaUVAC2Kr1cji8TEzVOGNgPT1i10IskyksSTCBA0PpAEYkAMX40aJGGZWohDRqOwgAmTmL/qdeExHjA+2q/wCrf+1/0wTsVK/WzagvJP8AjREbt5LSPZE/2m1/ZtCXYM9M7EpJwOHNgEHh94wLtTtqXh5Exa1AMmg1JNB5mKXsv2llDBypImMpIOZ0qp3id26A7RwWBxCguatKlsEv7QinJ28oxlL6LUTzKZtHEzFLC5hXKWCCkgFwelKRa7L27Ow8oSpRyoBdr+sbBXZjDKDImEclJPwiNM7FJNpx6oHwIiVRTMviO0M5XvLWeGYgeUZ/be00ZFJmOcws9Tx/GLbbmBKSUSJiZihQqykAHhUuYyk/s1iXKlS1HV7vFRlF9ENmdUuFKuMXR7N4h6yZn8pgg7Kzz/qZn8pjXYVFAJkPEyNEjsXiDeWsbj3W6uYsJP2czyHVMlp4VV6U84HNewoySJCiHCVEbwlR+EdHpcjZeNQkITPkhKQwAk0boY6I8g9SWvD4eatIWhJUQzgFJrxBFa8bxV7T7GSUDOMxSbsqwNt5iYohKmN/K+n4RPwu0gmhJIo5I3HeQ0cickXa+zI4rsghiZczKdAur8ikfCKif2anp0Cn/ZUCeodwI2W0Z0rMMiiHqQ7gHhQQApWTlrya5i1lkjNtGMOxMQ39UongQaeMCOyZ4vLUOcbafhpiWcsTo7GI0lBCs7vwNfL4weZiMj/RE82lLLXZJ+ENXsmeA5kTG35C0ei4rFKKhkKgwZqtUesR1SVKcFXNz9OYPM/RVGA/QJo/1a+iTDpcqe4AE0fwqPwjfGQVXLdbcB+EFl4WeVMkLVRgwJpbdD879BqYVCcQATlcAsSU799t0TcNImq95CRR/ejc4Ds1NUClkIYv3jUEvWjv1hm0+y81NSEKYNnDZixcCreAHrD80vQalLhuys9f/wAY/jB9IOexM/8AalD+JX+WAK2YpBYhaF73yk8qAxLlYqchgJq2BD1d94GZ4SzsaS9Ax9n+JVYyjymfhCH7OcX+wk/xp+MXeD29MSRnKC/FuvCG7R7YEABMwIYmqCST8Gru0ilmbK0RRnsDjRaX4LT84b/objx/qSf4kf5onK+0WcmiVBdA5XLF+DEN5xMwn2oH78lJ5Ej1eL8s/QtYlIrsxjx/6cn+JPzh+F2Lj0+9hZnRj8Y2GG+0bDH30TE9Ar0NYsJPbbAqb9cUvbMhY/6YPLL0LReyo7LSpspcxS5M1LyVAOg1JUktSmh8IFtKYq6w5qzhsr6B7aRp5fafCH3Z6DzJHqKwb+msMbzpZ6iIcmyqSMhs1ISlzrV4cqcD1jVzNoYNVFLknm0Ve1cZgAl3SpT2Qo+JA0gsDOYmY1KRUTNqL9oJctVBdifB4biF5lEplrIP7RLeenSFw+Gne8ChAF+6TXQCCybLCQyfe10G70EW0pikZahr6gbjvitRs9cxIK5qgDoAE/j+cSkbGRYqmq/4ivR4NUhk2WpKR3qDfYfn84ly50tveTrqPOKtOx5OqSrmon1iRK2PIAJ9mnqNYKQyb+mSheYhuKhEfE7Sk2E2XxdQ+EMk4GUH/VI/lEIZMsUyoHQHoWtBwIiL2hJf+uHRQb0joU4NJqUseDt0aFg4ArUzHD2IurUV66wi8MTUlRrStBzppSkW04IUgDIkm5ZNBWgF3Dw2X3VFwljqKh9w0A/CMQ0KeXs9QJcliXsHp6eMGXhq90qI1LsaacBF6vDpURmWylc9Df8AMwKYrK4SUqa6tS3oIBqBWfohIew0FPBzcwkvDJC2UCAzlmd+ESJ6jxatC/y+miNkz0Sl2GlC+vOloQ3Q7NLJolTA66c26Qb2iNSNzsXPxhmw8PLnzJqFonSikDIop7qrg1qCbXjp+xpyM59mVJ0ITVuQ1itaCxs5YKSEHLQ1Du2prSKVJx8lSRhp61gFikgkgE+9lq4rVt0WctIDA91dRXXgAbQ5Is9ONfGHF0DVjcJ9omIlLVLxGHSopcFQCkFTFqA2ehtrG22d2rws1RTmyLFwqlDYg2MYqdg5SgSrKA9VPfm8OVgZROfMaJymgcMXD0GhMXsgSPRllCgxSkg8AXEVk/szIUSe8H3KOWu4FwOUZXDS1IJ9jOylyWPu1dWnCmkXy+0oEkAge0YAncdSl+rX0iW0Oit2tsCWhY/UhctiSv8AYI1VXWukZ+XJlBShllhIr7rvpSg18q1gMwzSpysq/eJrrpS0GJoOFvr60jNsiwagkhghDcocjDIVVIIelmD6Ub6aJMrDd5rbhvqH+ucS/ZMpNqAqJ3l3fgMoPnBsy0irUSkd1L11seXV/CHCcavR+DtTjfxiXiZISxsyaf8AMf0AiCqYFsCCmwBKWFr+toFyJjpa/wBpVG01rq8NlT1JSQyTYAhNBW5erseVoVGUFlzEi7VJfhWnSETOQRQOdQCw84pEjQSVVJawbfe1h0g8mcSaDNzFX6hoLsyWlRKWKVB3cUbcK+cSEygoEihtS/OtGikgQ/DhxmypbRxbiLvE5Ey71BFCYjCWABagYk3ULuGh+GBdj8/A/GLoYdKiKkjdw+uEGWqI0uSz2PkfrhBUJI1pztDEE8niYlWnCASUDfyraCKZ3+qwmMGZgc+P5xHUX1Yk6jdw1BhuMVoOVD84AslKCXfm70en48oQA5q3JLnxItS0dFNNx4SWMxiKEUjo0omyzmTlG7cxv3929IsZGCAyOQt6qSMzizAlhobCAKwimBCSxIpmSlh8fGD5Epeqg4NyDTfzd45S0S5kkGpSRWwDFrcz+EIlQBCQUubKIJpwADPEGViMymuWYKexp71adIkrnBz3nN1B6Ft72EFjsrMZmUSpweNmPjygMjEFDmhej8H+rxbTEJWAQ4Tq7ADrR6xX4lLJqks1CxNqkqOrwq9EtGk2Nj5WUCyrFw1YsZhUSwU3QP50bpHn0xVbDoa0/OLLBbYXLACmUncTURcZexWaqfhUrotKVfvV9Yq8T2YQodwlCuFUnmkn0MOk9opTFwsndSnWK7G9p5qqSgEgKD0zEp1q4bm0W2hlLitnqlzSlSkrCQpJFGdhWtqcNYipkD2age8lRoM+YBr5SGeuhiYZqu+pZJWrW+mp0No5QAGYkO3us1+TMYiwBpBS2QsAzUcsK5XuAbdYbNU5dwS1aQKfigAwfmKj8rxDn4wtYmJE5FihLgVFiXqRwFPqsRpgarnR+DacfyisXtAgFh6eEQ8TjFzHSE5TrwGpBPExUY2TsaqRNSQDmZQA7u8BgSOBISDurvESl7XQK07zgubMAp2O4LqeBjAYDAzfapUpbKzAAvUucpA/m84vMN7WchaZhHdLBNzRnUki4Bfx8KcEilM0B2hLWzMasONB4OR5RHnqS6VBQUasWFn41/KIOHSiWEFXvVcPRgbkB6mzV+Tp12SSkasaH1Y13RAm2PkIdRfKX0oG+hFicGggOGJoA/d5+PGKuThA4UdNHFeZ3RNkAFk+B3Fr34RaBFlKlBUupBY0JDWDNRnaG4iSUozBQJ1Uo3ejAvQ0h+cK7rBaaO+r8+UNxJSSJaSBl+6QwO5qb+EWUNwKlPkIO81PkeUSg5LVoSQSNeLCCoQEp9fxaFmJe2tns8AHYcsTx5+kGMsNQ/h9GI81INQCW0468oKiZ3XsdxvbWAA8tO8i14QpdwCFa5h5c4TCTAQSSHa2sR8XjsqvZ1BKe7SnU2BqKE6QAcZAIJUHYWABfjxiFjbBjqC1iBc+UW+FlMjMTmIuWYvvDxSdop7JUshwhJU/1YwLsGZFCpS+8tTqJJLs9ywPdNgw6R0T8PhM6QshJJDkqFX4928JHRZkaBZOX392rPc8mFusdOC8uXKgE6g5lWbfaNRhezqBWYoE093hpX5RZYfCSZfuSwDvufExxKBoYrBbGnzS4QQCwKlUDcHrBBgMmYLUkFAqklYPNLDlUb425UoxEx+y0Tgy7iyhccvlFaIKMPKmhDEKHCpLHmGifKnKmnKM9Kn7oau8WPxgO09nrkLBIF+6oOxbzB4RX48zAr2iSSvWrDcxKQ48IimmKywx2yMrnOFH9mg8yeEQJsphmdLBWVYzJzOwNE3sRUtFh2f2gHafLSABRQJUSeZHrEbbuPTOnJMpDLd2cNQAMQ3GnKHwVx9FfImguKa0PHSFE9vdHw+PDyiwl4CYpImNLc0oSKWr3WfpEDGTMswtlBFHSXHAg69d8KVohsaudmcANy1iPlAt9cC7VhwW+tTV21+MNSQ9dKnQeURYrETIBJ/DyhJmHGrch8aQRlOCRQltDxfgK3hubMwBsdRV/jFDAHCJZ+PrvEBMhGZypTG7CtDV/T6ETwij1DeNbNWv5QEIIbMRqK0q/HpTlwikOiN7FLlQcpNXJsXud2nlEmVh0ZlZqd10kN3lVSyq0BrXlHSFhK2UCb2NC+jjS26FSxGbgwYgBgGoLW0goKEmMNDq2upL+JeGrWBUDwpem+8MxEoKGUrIe456FucPRhiBvFnt+Fyr6eHQUSUz02YmxtYhnu0SsHMzsxpwp5G0RZOFWQRmIDXIfwYV5RYYXAy0hy58cpHLc/rDSGrJmJwhTmNE5mNSFAgXYb7GGYfvHOVOkPlNQW4mjjxESLUISAbX00AI4Pd4JhiMtACC+/XQiLGLIxCFvlUFAUUx13E2eHZGNHt0/DpDCk0YgJHC43W+mgwVAAx8tfOEWoGCKUIjTUZn58jvhAESljmq41oxHyhZKs1TQuzEjTcYRNBe29y/BnHSCBRd3GVtzc3+UAEiYSczEUqQSx1e8ZXtdNHslJqCshIZy5dy/QRo3uSXcWYet4xvaKamauUhBsouCSKXara7uHCLh2J9EzZskplIHeLDc8dBxLoKmw3u3HjHRpZnR6I8SJVo6OjA1Hwhjo6GBF2kgGUsEAhiWIe0YDFD3eIS/GOjojJ8SZDZqjmTXQekCw8sZrDwjo6MF2JDZ81WWSHLEVD0NTeKfMfaJDlq00vuhI6NJ9sUyyQO6f3P+oQkwVHWOjogS6AyC+d6smnC0FlHuvz9I6Oi0Ujph746R2KFuYjo6HEorkzD3qnXWJSC8tBN9+txHR0UwIr+9z+UXWzas+9Xxjo6BBEfNOVstO8LUuAYtZYdDmtU3rpCR0NFFJtScrIO8f65rm2cU5RpJunQdISOjT/Uj7HSjQncsgcA5hMQe6rr6x0dCYDMSWZqfRhEFwX3D1MdHRLKDq95tGNIELq5n0jo6ABpNVc4yCh/4+aNyUtwsaeJ8Y6OjTH2TLot5iy5qbx0dHRZJ//Z" alt="">
            <div class="flex justify-between items-center p-4">
                <h2>قلعه اشتران کوه</h2>
                <strong class="text-xs text-600">مناطق دیدنی</strong>
            </div>
            <p class="p-2 text-sm leading-7 text-gray-700">این قلعه واقع درش مال تویسرکان سات که به اشتران معروف است و خیلی جای قشنگی است ... 
            <a class="text-sky-800 hover:text-sky-500 mx-3" href="#">بیشتر</a>
            </p>
        </div>
        @endfor
    </div>
</section>
{{-- ------------------------------------- --}}
{{-- شاهیر section --}}
<section class="3xl:w-[75%] 2xl:w-[100%] xl:w-[95%] lg:w-[90%] w-full mx-auto mt-[60px] flex flex-col justify-center items-center">
    <h2 class="text-xl my-5 font-bold">برخی از مشاهیر</h2>
    <div class="flex flex-wrap justify-between w-full items-center">
        @foreach ($celebritise as $item)
        <div class="2xl:w-[23%] xl:w-[30%] md:w-[45%] lg:w-[40%] w-full p-2 rounded-md m-3 h-96 shadow-md border">
            <img class="w-full rounded-md h-2/3" src="{{$item->picture}}" alt="">
            <div class="flex justify-between items-center p-2 px-4">
                <h2>{{$item->name}}</h2>
                <strong class="text-xs text-600">{{$item->job}}</strong>
            </div>
            <div class="![&_>p]:text-justify [&_>p]:text-xs [&_>p]:leading-7 [&_>p]:text-gray-700">
                {!! mb_substr($item->description,0,130) !!}...
            <a class="text-sky-800 hover:text-sky-500 mx-3" href="celebritise/{{$item->celebrityID}}">بیشتر</a>
            </div>
        </div>
        @endforeach


    </div>
</section>
{{-- ------------------------------------- --}}
{{-- news Section --}}
<section class=" w-full lg:w-3/4 mx-auto mt-[60px] flex flex-col justify-center items-center">
    <div class="flex flex-col p-5 xl:p-0 xl:flex-row justify-between w-full my-5">
        <div class=" w-full xl:w-[59%] 2xl:w-[68%] flex flex-col h-full">
            <div class="w-full h-[350px] my-5 xl:my-0 xl:h-[480px] rounded-md">
                <div class="swiper w-full h-full Galary">
                    <div class="swiper-wrapper w-full h-full">
                        @for ($i = 0; $i < 8; $i++)
                        <div class="swiper-slide w-full bg-green-500 h-full flex justify-center items-center">
                            <img class="w-full h-full rounded-md" src="{{url("/")}}/assets/img/2.jpeg" alt="">
                        </div>
                        @endfor
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                  </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="w-[48%] bg-red-500 my-5 h-[150px] xl:h-[250px] rounded-md">
                    <img class="w-full h-full rounded-md" src="{{url('/')}}/assets/img/3.jpeg" alt="">
                </div>
                <div class="w-[48%] my-5 h-[150px] xl:h-[250px] rounded-md">
                    <img class="w-full h-full rounded-md" src="{{url('/')}}/assets/img/1.jpeg" alt="">
                </div>
            </div>
        </div>
        <div class="w-full my-5 xl:my-0 2xl:w-[30%] xl:w-[40%] shadow-sm rounded-md border border-gray-100">
            <h2 class="w-full bg-gray-50 px-5 py-4 rounded-t-md border-b-2 border-gray-200 ">اخرین اخبار</h2>
            <ul class="p-5">
                @for ($i = 0; $i < 8; $i++)
                    <li class="my-5 flex justify-between items-center bg-gray-50 px-4 border-r-2 border-gray-200 py-5">
                        <a class="text-sm hover:text-purple-900" href="#">
                            اجتماع بزرگ تویسرکانی ها در میدان آزادی
                        </a>
                        <div class="flex justify-between text-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path d="M10 9.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V10a.75.75 0 0 0-.75-.75H10ZM6 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H6ZM8 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H8ZM9.25 14a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V14ZM12 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H12ZM12 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H12ZM13.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H14a.75.75 0 0 1-.75-.75V12ZM11.25 10.005c0-.417.338-.755.755-.755h2a.755.755 0 1 1 0 1.51h-2a.755.755 0 0 1-.755-.755ZM6.005 11.25a.755.755 0 1 0 0 1.51h4a.755.755 0 1 0 0-1.51h-4Z" />
                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd" />
                              </svg>
                              
                              <span class="mx-1">یکسال قبل</span>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</section>
{{-- ------------------------------------------- --}}
@include('layout.Footer')
@endsection
@section('scripts')
<script>
    function showCurrentTime() {
    const currentTime = new Date();
    const hours = currentTime.getHours();
    const minutes = currentTime.getMinutes();
    const seconds = currentTime.getSeconds();
    const day = currentTime.getDate();
    const month = currentTime.getMonth() + 1;
    const year = currentTime.getFullYear();
  
    const dateElement = document.getElementById("date");
    const timeElement = document.getElementById("time");
  
    dateElement.textContent = `${day}/${month}/${year}`;
    timeElement.textContent = `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
  
    setTimeout(showCurrentTime, 1000);
  }
  showCurrentTime();
</script>
<script>
var swiper = new Swiper(".celebritise_slider", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    speed : 3000,
    autoplay : {
        delay : 4000
    },
  });
</script>
<script>
    var swiper = new Swiper(".baner", {
      spaceBetween: 30,
      effect: "fade",
      speed : 2000,
    autoplay : {
        delay : 5000
    },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".Galary", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

@endsection