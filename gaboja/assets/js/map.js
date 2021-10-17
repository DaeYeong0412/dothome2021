function zoomIn() {        
    // 현재 지도의 레벨을 얻어옵니다
    var level = map.getLevel();
    
    // 지도를 1레벨 내립니다 (지도가 확대됩니다)
    map.setLevel(level - 3);

}    

function zoomOut() {    
    // 현재 지도의 레벨을 얻어옵니다
    var level = map.getLevel(); 
    
    // 지도를 1레벨 올립니다 (지도가 축소됩니다)
    map.setLevel(level + 3);

}    

var counter = {
    idx : 0,
    add : function(){
        this.idx = this.idx + 1;
    },
    minus : function(){
        this.idx = this.idx - 1;
    },
    show : function(){
        return this.idx;
    }
}
var markerArray = [
	{
		imageSrc : "http://eodud0412.dothome.co.kr/gaboja/assets/img/start.png",
		imageSize : new kakao.maps.Size(50, 50),
		imageOption : {offset: new kakao.maps.Point(25, 48)}
    },
	{
		imageSrc : "http://eodud0412.dothome.co.kr/gaboja/assets/img/route.png",
		imageSize : new kakao.maps.Size(50, 50),
		imageOption : {offset: new kakao.maps.Point(25, 48)}
    },
	{
		imageSrc : "http://eodud0412.dothome.co.kr/gaboja/assets/img/end.png",
		imageSize : new kakao.maps.Size(50, 50),
		imageOption : {offset: new kakao.maps.Point(25, 48)}
    }
]

var markers = [];
var drawingFlag = false; // 선이 그려지고 있는 상태를 가지고 있을 변수입니다
var moveLine; // 선이 그려지고 있을때 마우스 움직임에 따라 그려질 선 객체 입니다

var distanceOverlay; // 선의 거리정보를 표시할 커스텀오버레이 입니다
var dots = {}; // 선이 그려지고 있을때 클릭할 때마다 클릭 지점과 거리를 표시하는 커스텀 오버레이 배열입니다.


var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
mapOption = { 
    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
    level: 3 // 지도의 확대 레벨
};

// 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
var map = new kakao.maps.Map(mapContainer, mapOption); 

// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
var mapTypeControl = new kakao.maps.MapTypeControl();

// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
var zoomControl = new kakao.maps.ZoomControl();
map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

/*
    =====================
*/
// 주소-좌표 변환 객체를 생성합니다
var geocoder = new kakao.maps.services.Geocoder();


    // infowindow = new kakao.maps.InfoWindow({zindex:1}); 클릭한 위치에 대한 주소를 표시할 인포윈도우입니다

// 현재 지도 중심좌표로 주소를 검색해서 지도 좌측 상단에 표시합니다
// searchAddrFromCoords(map.getCenter(), displayCenterInfo);

// 지도를 클릭했을 때 클릭 위치 좌표에 대한 주소정보를 표시하도록 이벤트를 등록합니다
var clickLine // 마우스로 클릭한 좌표로 그려질 선 객체입니다
kakao.maps.event.addListener(map, 'click', function(mouseEvent) {
    if( counter.show() >= document.querySelectorAll(".ij__js td").length ){
        alert("경로는 최대3개 까지 등록 가능합니다.");
        return false;
    }
    
    searchDetailAddrFromCoords(mouseEvent.latLng, function(result, status) {
        // 마우스로 클릭한 위치입니다 
        var clickPosition = mouseEvent.latLng;
        
        // function deleteClickLine() {
        //     if (clickLine) {
        //         clickLine.setMap(null);    
        //         clickLine = null;        
        //     }
        // }
        function deleteCircleDot() {
            var i;
        
            for ( i = 0; i < dots.length; i++ ){
                if (dots[i].circle) { 
                    dots[i].circle.setMap(null);
                }
        
                if (dots[i].distance) {
                    dots[i].distance.setMap(null);
                }
            }
        
            dots = [];
        }
        function deleteDistnce () {
            if (distanceOverlay) {
                distanceOverlay.setMap(null);
                distanceOverlay = null;
            }
        }
        if (status === kakao.maps.services.Status.OK) {
            var markerImage = new kakao.maps.MarkerImage(markerArray[counter.show()].imageSrc, markerArray[counter.show()].imageSize, markerArray[counter.show()].imageOption );

            var marker = new kakao.maps.Marker({
                position: clickPosition,
                image: markerImage // 마커이미지 설정 
              });
            
            /* 핑 이어주기 */


            // 지도 클릭이벤트가 발생했는데 선을 그리고있는 상태가 아니면
            if (!drawingFlag) {
                
                // 상태를 true로, 선이 그리고있는 상태로 변경합니다
                drawingFlag = true;
                
                // 지도 위에 선이 표시되고 있다면 지도에서 제거합니다
                // deleteClickLine();
                
                // 지도 위에 커스텀오버레이가 표시되고 있다면 지도에서 제거합니다
                // deleteDistnce();

                // 지도 위에 선을 그리기 위해 클릭한 지점과 해당 지점의 거리정보가 표시되고 있다면 지도에서 제거합니다
                deleteCircleDot();
            
                // 클릭한 위치를 기준으로 선을 생성하고 지도위에 표시합니다
                clickLine = new kakao.maps.Polyline({
                    map: map, // 선을 표시할 지도입니다 
                    path: [clickPosition], // 선을 구성하는 좌표 배열입니다 클릭한 위치를 넣어줍니다
                    strokeWeight: 6, // 선의 두께입니다 
                    strokeColor: '#3396FF', // 선의 색깔입니다
                    strokeOpacity: 0.9, // 선의 불투명도입니다 0에서 1 사이값이며 0에 가까울수록 투명합니다
                    strokeStyle: 'solid' // 선의 스타일입니다
                });
                

                // 선이 그려지고 있을 때 마우스 움직임에 따라 선이 그려질 위치를 표시할 선을 생성합니다
                moveLine = new kakao.maps.Polyline({
                    strokeWeight: 6, // 선의 두께입니다 
                    strokeColor: '#3396FF', // 선의 색깔입니다
                    strokeOpacity: 0.9, // 선의 불투명도입니다 0에서 1 사이값이며 0에 가까울수록 투명합니다
                    strokeStyle: 'solid' // 선의 스타일입니다    
                });
            

                    
            } else { // 선이 그려지고 있는 상태이면
      
                // 그려지고 있는 선의 좌표 배열을 얻어옵니다
                var path = clickLine.getPath();
                
                // 좌표 배열에 클릭한 위치를 추가합니다
                path.push(clickPosition);
                
                // 다시 선에 좌표 배열을 설정하여 클릭 위치까지 선을 그리도록 설정합니다
                
                clickLine.setPath(path);
                
                // var distance = Math.round(clickLine.getLength());
                // displayCircleDot(clickPosition, distance);
            }
            
            const address = (result[0].road_address) ? result[0].road_address.building_name :  result[0].address.address_name;
            // 마커를 클릭한 위치에 표시합니다 
            marker.setPosition(mouseEvent.latLng);
            marker.setMap(map);
            markers.push(marker);
            var nowCount = counter.show();

            document.querySelectorAll(".ij__js td")[nowCount].innerHTML = address;
            
            counter.add();
            
            //마커를 클릭했을때 이벤트를 등록합니다. => 마커 삭제
            kakao.maps.event.addListener(marker, 'click', function(e) {
                

                //삭제할 마커를 클릭했을때 마지막번째의 마커를 클릭하지 않으면 클릭 취소
                if(nowCount !== counter.show()-1 ){
                    alert("마지막에 클릭한 요소를 선택해주세요!");
                    return false;
                }

                //현재 마커를 제거함
                markers[nowCount].setMap(null);
                
                
                if( nowCount === 0 ){                
                    clickLine.setPath(null);
                    clickLine = "";
                    drawingFlag = false;
                } else {
                    path.pop();
                    clickLine.setPath(path);
                }
                 //제거한 마커를 마커배열에서 제거
                markers.pop();
  
                console.log(nowCount);
                document.querySelectorAll(".ij__js td")[nowCount].innerHTML = "";
                counter.minus();
            });
        }   
    });
});

// 중심 좌표나 확대 수준이 변경됐을 때 지도 중심 좌표에 대한 주소 정보를 표시하도록 이벤트를 등록합니다
// kakao.maps.event.addListener(map, 'idle', function() {
//     searchAddrFromCoords(map.getCenter(), displayCenterInfo);
// });

function searchAddrFromCoords(coords, callback) {
    // 좌표로 행정동 주소 정보를 요청합니다
    geocoder.coord2RegionCode(coords.getLng(), coords.getLat(), callback);         
}

function searchDetailAddrFromCoords(coords, callback) {
    // 좌표로 법정동 상세 주소 정보를 요청합니다
    geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);
}

// 지도 좌측상단에 지도 중심좌표에 대한 주소정보를 표출하는 함수입니다
// function displayCenterInfo(result, status) {
//     if (status === kakao.maps.services.Status.OK) {
//         var infoDiv = document.getElementById('centerAddr');

//         for(var i = 0; i < result.length; i++) {
//             // 행정동의 region_type 값은 'H' 이므로
//             if (result[i].region_type === 'H') {
//                 infoDiv.innerHTML = result[i].address_name;
//                 break;
//             }
//         }
//     }    
// }



// 키워드 검색 완료 시 호출되는 콜백함수 입니다
function placesSearchCB (data, status, pagination) {
    if (status === kakao.maps.services.Status.OK) {

        // 검색된 장소 위치를 기준으로 지도 범위를 재설정하기위해
        // LatLngBounds 객체에 좌표를 추가합니다
        var bounds = new kakao.maps.LatLngBounds();

        for (var i=0; i<data.length; i++) {
            displayMarker(data[i]);    
            bounds.extend(new kakao.maps.LatLng(data[i].y, data[i].x));
        }       

        // 검색된 장소 위치를 기준으로 지도 범위를 재설정합니다
        map.setBounds(bounds);
    } 
}