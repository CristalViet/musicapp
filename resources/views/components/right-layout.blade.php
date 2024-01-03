<!-- Side widgets-->
<div class="col-lg-4">
                  
    <!-- Categories widget-->
    
    <!-- Side widget-->
    <div class=" mb-4">
        
    <div class=" fs-4 text-primary">Bảng Xếp Hạng</div>
        <ul class="list-unstyled">
            {{-- record bài hát --}}
            <li class="d-flex gap-2 mb-2 p-2 rank-card">
                <div class="">
                    <a href="" class="unlink thumbnail-music">
                        <div class="relative">
                            <img style="width:100px;height:100px" class=" rounded" src="data:image/webp;base64,UklGRpgLAABXRUJQVlA4IIwLAACQQACdASqYAJgAPt1kqlCopSOnJtVcIRAbiWdruHxZD0wwdPv5/1+N/f5zwR7Nna/MxB7srz6vZdjzfhS/d03NQ25Qc68KYg1ml23A+and9GU0sn7QgDcgF388VqcC0xujJYmLr7cqHcwEFDjRgLMthSbPDwNuL7N2uiQtCXrprx41GYwaOhzGPr4YhThrDUTYFnEtTN1mjTr2VV/jqRoLY9YgEYyky4SeW70mccVcTV5THah9fu9i7chARU+21pzw/dObZYINIvuCYJpY/muOTVVSwST3hBOakQb8gkDiYk+oAEIl/df47M50ngy4Hi+DVfX5pDnOD39ah8bdOFStwtZhQLU5JtEDLz9/pc/HYV2TGIhwiF8ZvVswK5lM/agTIEfLIscAu1joIFc7O5smIJPpVtfSwki15buvlFDbdJVVI1zO8szzobcG9OTzzwUNzvJjgKUSbP34XYZDGbJ8xvEMVk4VKnswEJAusxS9gvhpgZmeImoSIB653hYLiAQlPCViv/426qgiwzOMjOno0QVM3RmTcF2iy6w68PADfeVTPD4owVL5eJmpuDWwouRLrm1TVCevS7162lLwS6uUSTMsHHHeWil43ilVRFuU6DhXg+ClKqSrIiWSeV1W8uc0oq3TZHICZ3DV1j5R0R+5JjmQOIG5h2tIlx6IWrgotA9p98BNKtHzQ+BywAAA/lTPWllaPjLANmYC50BM5b1MtUXuRYb48KRdnWH4alPH6mSK4hGy4pE5pPtetoOUgE6SusMaUWjYPX07ZCL84Q2kGiDIEPzM6tdwe9rG4WBZUgLOuCMcPle0C9eeL15AFGyTVksJNEcfpFFvyIE8GNLz1QXnlZUvp2iL7DlVsM76hzP00xKo5o9Edp5i/V/jKeyFItzlHKhJPUpTy2OgwfW/dTzBgTAsbc4Nez0WSCr9pZ6GIEOy5Kq1fsK+48wcHWLVyAF/ZxhjDHN5082bKy2NSlZdol+LjfHfIX2Zm+Dql/AD9UW4odgAlfK8rV5XZjAiKfQDu0yoPGdCx1HlB5d1FT/eYRhVactbKP0tFjg5+oxkSL4mILBEznQWKUeeFGTgs2XN83NhQjcS9PDkFkURkrUu0eIBVvK7fkgYndGgACWHKn8VD0wVFEYeRp29cRfaCHXIu0MlVhz9btQVlVPQrWqf0GtGblyXNnoM+685Hh9wCudr330L2w7zOqju73OvNMt4EZ14S6XBp40S4jbrVNcjDXgfRTX/3nR0ONmTYgNCqWiiTwA2sTjiBKizOiDpEmiC5mUTR2qCfjasYC/eRBbqvBiKPV4fsprwE3STp+fIkJGvffAHCtJ3lqQlKzMw7aPau0KP5AjRm7sjtYO1ScsZfAZBCgzqCZOVpTQllJuN5amfeV6Ki//3Z6hukGtAoRLEaMNopqZgxaiO9gq2O3lX/6Z2vQrQpSx66XkPYG1x6f3spsgN0Isf62Cm6IkvuOMWql+2bqNzFtEyOUuaSZajmqk5CtUMAjV+Uriz336sA94NerZDo7Wng5JPigtMe34QPQoTUD2P5NhhAqbRs39zvGvp7PDw7YNqxW0A36VzB4uf382Bq3J3XeXsTd1f5CEoaC9i2iGq3uFoKh3EgVoXhA5+OSW7Gy92Av7Q7c2cLRVQgkO10/ghpihuHmaV9gkAMIfuB4fTLThspXoj2wfnleTCYt9fG9VNWRR9TBetLOsv7PIR9ecI6HregGBUwoKlFV/4CtxCf9pfRs1sSKALhBHVH8YWpEPWenR+55twocRdJRn350k/728jpvEX/dqOlGPR9caUTjTcMBMeBVf04ibVtEYQpNMTuclRydFHswCedKlWhIDYQsAE6Y1JT9wiDnPXCR1uxycwx1CAXJgYoKIkm+VMlyQXIUelQ/4bCsaVfzFsQVnyg8M9IB7V0Yso/uiJ+vWT5za14xQ1C+1txqH+evGobmRixFbbhp4OTcfXJZYBIQ9CGxbmU42RHEJ8TkVtNHzT5P7L11SQSmfHSjuUh2cioa4WpnaxFPlaRPntwiBBHRvwERBKWb9VOUBjb7tpjJlwCF7igheq9BAFMRzhSwlt142rf1wySmWRMLP2AvP1oth8wV4g1zlGFL+tG2MkayKeNcT9P/vuSyFRVkhgHUYLRg68OYeOmxQWI8ouBAZcMndPu64iV74B69oIuAlePbp6WpCXL5gNgkyaLv0DjyyHykDscz7AuIQd5A9cilUiQmwpuFRK4/DZRSweD4Ax05Bt7S1JzJTbZny1dvF6VaMjK8pTXSUCmXrFYwrIxhZLXkHQaJM1qbhqYKJdn4/ettJvsfWuSZFV4bdu+dCoxAkWlpq5aDLCxB6En/xuVFi1O1tkHQgqDr09PBfTBlP92kBIto6Zs1bKz3VCL1fbCiU2zcasA8KymCZxRLz8Ean/kV6it6c69bm4nbWXsDQxZsxB19/WLqFyDLeX0c89+jVZGwpCARSSSvuSeWNPXd6MLKYe2rXpIniIf3OZt2kZ1JQ93+2Dq/ny4YOR2nz7DYPLzmArmAsXMR2pEVZFU8B60wonZm4bYzWm6nwGMLoZfpWFPYKe15d/VsLFOwSAyQrLSnkYDJD8g8JuRlD/ZHv6RTn2yt/1Gz93V1VtBe+AaxWy5ZvTuo67jhhsDiH2qCpzIgUXe7QF0Eo0Zt9h5yO4uJ7v6iJfXeloKWf2GrX1gQOLcg/T1R9/w9CuUnKUhgXjun4fdSXeXCbRexswKy0YxoUGiUmdPuYnOT089Fo+3KBBDeUjQWlWbou9DjL/5+gH2WgZfOjzMhSx5+6bJpOybzUuCnJOqQ/SocG2p94EY3hxE9uHXbjvFVNXHzQJhfFn9zlxj3d53rYOXQrVAyAi/W5uYX/XYdlUInfOdyS6pURpJqe7I3VCoPtcZy6E/g4YjTyQdjW58kggHBGoN0KJa20y5tO9wx8uFOKOin5a++OdKA2L/UufhhmQuafQdi7fyo7ro4ansA7cDgiE0rdH5s/YFD0OnHQZaHP6Gjsb5VZIYJUgjHEumNiqNtSBjfCHqPiKlfNXtytgAQd+xIq91BYuKY+/1aoBcx1SaxhLVjO2GxbhXVDpldnoVHWbZmv+77yiNpCjgGZl/TuYYSUxYSNtNYKLsI2T+n/Aj3wxIxx6RZjo4g1QUTiGPzhoqcjBXdr9jHRQndzoebKPJhHz/8BmzV8hdFPKFSHQLqly5sG8YSf8neTqvd+6dTmLpcOkptQHvGcObn+wlGTQdg+ISZHP7ZH/egq9NI4fO5ZivJRZSY+Cd4emUxpXM7zVQ+iEv5QdiKtcqVVzuoIKqsRBauAHoV0Aha4RrJ4zm370iKK2rC3WXrfqQ8SitFUngHhx6VcNQRbM8zfRlaLGTFA4RfdG+pFvC6o238UPL3FAeejGq9LPImvrrIoP14sA0jSc9tsabhrzWI4KZUqxYVyAgT7Up3aqvN2wlJ6oV0q15MWd1jIWR8YPlKM56Q34IoNcAsfm36iMymiXFpROHaAr8JurwWVCw1vw1ZR13qgKBFNu3VGhTvciENRKntIjP2aJAfoauDwskFlec0k6RssShUulMqAN3dq1eC/4gUcmUJ/mGKV3L0c/IQx03LfO1Fr7j0NEjVxCu3lMxb/ALfWDSwg/28EpKQQOwQY5wZfhhRn17r4Km/dj5pDPGjmWl7DhmaAzp7TetN0BMHytDalAzs2gnfdQi0dMkj5FhLAWbAWC3LMouoQddKmSMH9AV6mb1hrsOJ0xtuf3UqWKqhO6fOgwex2nS5r3oO7+h2N8g3FwElnGdC06ji0TByNxkDsPTBERL0pQTqQYvWrGqrgF5WRLAaH7x5C9pZzbH4gzwpKXoAUyYVYMPFjerlZl6MapiTTjrmv9LBpEwqrGBFxyP8GVmbPR9CeYU4ZMNDgwrg+tARiO4uz8Ukk+wsKq0R1ZQAAA" alt="">
                            <span class="number d-flex align-items-center justify-center rounded special-1">
                                1
                            </span>
                        </div>
                    </a>
                </div>
                <div class="">
                    <div class="fw-semibold">
                        <a href="songs/4" class="unlink">TestX</a>
                    </div>
                    <div class="text-muted">
                        Muhammederdem                    
                    </div>
                </div>
                <hr/>
            </li>
            {{-- record bài hát --}}
            <li class="d-flex gap-3 mb-2  p-2 rank-card">
             
                    <div class="">
                        <span class="number special-2 fs-5">
                            2
                        </span>
                    </div>
                    <div class="">
                        <div class="fw-semibold">
                            Nhạc rất ok
                        </div>
                        <div class="text-muted">
                            Sơn tùng
                        </div>
                    </div>
                    
               
            </li>
            <li class="d-flex gap-3 mb-2  p-2 rank-card">
                <div class="">
                    <span class="number special-3 fs-5">
                        3
                    </span>
                </div>
                <div class="">
                    <div class="fw-semibold">
                        Test
                    </div>
                    <div class="text-muted">
                        
                    </div>
                </div>
            </li>
            
           
            
       </ul>
    </div>
    {{-- <div class=" mb-4">
        <div class="card-header text-primary mb-2 fs-3">Chủ đề HOT</div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2020/06/22/9/7/b/e/1592812587983_org.jpg" alt=""></a>   
                        </li>
                        <li  class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2020/06/18/9/5/f/7/1592450065128_org.jpg" alt=""></a>
                        </li>
                        <li  class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2022/12/29/d/7/e/a/1672295549195_org.jpg" alt=""></a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </div>
    </div> --}}
</div>