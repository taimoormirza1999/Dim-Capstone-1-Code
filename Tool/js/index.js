const url = new URL(window.location);
const unit = url.searchParams.get("unit");
let w = parseFloat(url.searchParams.get("width"));
let h = parseFloat(url.searchParams.get("height"));
let pname = url.searchParams.get("projectname");

if (pname)
    pname = new String(pname+" ("+w+" x "+h+" "+unit+")").toString();
else
    pname = new String("Untitled ("+w+" x "+h+" "+unit+")").toString();

document.getElementById("title").innerHTML = pname

if(unit=='in'){
    w = w*96;
    h = h*96;
}
else if(unit=='cm'){
    w = w*37.795275591;
    h = h*37.795275591;
}
else if(unit=='mm'){
    w = w*3.7795275591;
    h = h*3.7795275591;
}


const initCanvas = (id) => {
    const canvas = new fabric.Canvas(id, {
        width: w,
        height: h,
        preserveObjectStacking: true
    });
    return canvas;
}

const fontSelect = document.getElementById("fontSelector");
async function loadFonts(){
    const selectedFont = fontSelect.selectedOptions[0].value;
    for (let i = 0; i < fontSelect.length; i++) {
        const selectedFont = fontSelect[i].value;
        const fontFace = new FontFace(selectedFont, 'url(fonts/'+selectedFont+'.ttf)');
        await fontFace.load();
        document.fonts.add(fontFace);
    }
}

const toggleMode = (mode) => {
    if (mode === modes.pan) {
        if (currentMode === modes.pan) {
            currentMode = '' //Disable Pan, if already in pan mode
        } else {
            currentMode = modes.pan
            canvas.isDrawingMode = false
            canvas.renderAll()
        }
    }
    if (mode === modes.drawing) {
        if (currentMode === modes.drawing) {
            currentMode = ''
            canvas.isDrawingMode = false
            document.getElementById('draw').classList.remove("active")
            canvas.renderAll()
        } else {
            currentMode = modes.drawing
            canvas.freeDrawingBrush.color = color
            canvas.isDrawingMode = true
            document.getElementById('draw').classList.add("active")
            
            canvas.renderAll()
        }      
    }
}

const setPanEvents = (canvas) => {
    canvas.on('mouse:move', (event) => {
        if (mousePressed && currentMode === modes.pan) {
            canvas.setCursor('grab')
            canvas.renderAll()
            const mEvent = event.e
            const delta = new fabric.Point(mEvent.movementX, mEvent.movementY)
            canvas.relativePan(delta)
        }
    })
    canvas.on('mouse:down', (event) => {
        mousePressed = true;
        if (currentMode === modes.pan) {
            canvas.setCursor('grab')
            canvas.renderAll()
        }
    })
    canvas.on('mouse:up', (event) => {
        mousePressed = false
        canvas.setCursor('default')
        canvas.renderAll()
    })
}

const clearCanvas = (canvas) => {
    canvas.getObjects().forEach((o) => {
        canvas.remove(o)
    })
}

let jsonState = {}

const saveCanvas = (canvas) => {
    jsonState = JSON.stringify(canvas)
    alert("Changes Saved !")
}

const restoreCanvas = (canvas) => {
    canvas.loadFromJSON(jsonState)
    canvas.renderAll();
}



const createRect = (canvas) => {
    const canvCenter = canvas.getCenter()
    const rect = new fabric.Rect({
        width: 100,
        height: 100,
        fill: 'green',
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
        objectCaching: false,
    })
    canvas.add(rect)
    
}

const createCirc = (canvas) => {
    const canvCenter = canvas.getCenter()
    const circle = new fabric.Circle({
        radius: 50,
        fill: 'orange',
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
        objectCaching: false,
    })
    canvas.add(circle)
    canvas.renderAll()
}
const createTriangle = (canvas) => {
    const canvCenter = canvas.getCenter()
    const tri = new fabric.Triangle({
        fill: 'blue',
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
        objectCaching: false,
    })
    canvas.add(tri)
    canvas.renderAll()
}
const createEllipse = (canvas) => {
    const canvCenter = canvas.getCenter()
    const ellipse = new fabric.Ellipse({
        rx: 80,
        ry: 40,
        fill: 'yellow',
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
        objectCaching: false,
    })
    canvas.add(ellipse)
    canvas.renderAll()
}
const createShape = (canvas,shape) => {
    let obj;
    const canvCenter = canvas.getCenter()
    const url = shape.src;
    fabric.loadSVGFromURL(url, function(objects, options) {
        obj = fabric.util.groupSVGElements(objects, options);
        obj.objectCaching = false
        obj.scaleToWidth(100)
        obj.left = canvCenter.left
        obj.top = canvCenter.top
        obj.originX = 'center'
        obj.originY = 'center'
        canvas.add(obj)
        canvas.requestRenderAll()
      });
}

const fontFamily = "Arial";
const addText = (canvas) => {
    const canvCenter = canvas.getCenter()
    const text = new fabric.IText('Tap and Type', { 
        fontFamily: fontSelect.selectedOptions[0].value,
        fill: color,
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
        objectCaching: false,
      });
    canvas.add(text)
    canvas.renderAll()
}

fontSelect.addEventListener("change", (e) => {
    const selectedFont = e.target.value
    loadFonts(selectedFont);
    const selectedObj = canvas.getActiveObject();
    
    selectedObj.fontFamily = selectedFont;
    // canvas.setActiveObject(selectedObj);
    canvas.requestRenderAll()
    
});
const groupObjects = (canvas, shouldGroup) => {
    if(canvas._activeObject && canvas.getActiveObjects().length>=2 ){
        if (shouldGroup) {
            console.log("should group")
            canvas.getActiveObject().toGroup();
            canvas.requestRenderAll();
        }
    }else{
        if (!shouldGroup) {
            console.log("should ungroup")
            canvas.getActiveObject().toActiveSelection();
            canvas.requestRenderAll();
        }
    }
}

const imgAdded = (e) => {
    const inputElem = document.getElementById('myImg')
    const file = inputElem.files[0];
    reader.readAsDataURL(file)
}
let cropper;
const cropImage = (canvas) => {
    
    document.getElementsByClassName("canvas-container")[0].style.display = 'none'

    const cropContainer = document.getElementById("cropContainer")
    cropContainer.style.width = canvas.getWidth()+"px"
    cropContainer.style.height = canvas.getHeight()+"px"
    cropContainer.style.display = 'block'

    const image = document.getElementById("croppingImg")
    image.src = canvas.getActiveObject().toDataURL("png")

    cropper = new Cropper(image);
}

const cancelCrop = (canvas) => {
    const cropContainer = document.getElementById("cropContainer")
    cropper.destroy()
    cropContainer.style.display = 'none'
    document.getElementsByClassName("canvas-container")[0].style.display = 'block'
}

const crop = (cropper) => {
    if(canvas._activeObject){
        const cropped = cropper.getCroppedCanvas().toDataURL()
        cropper.destroy()
        const cropContainer = document.getElementById("cropContainer")
        cropContainer.style.display = 'none'
        document.getElementsByClassName("canvas-container")[0].style.display = 'block'
        canvas.remove(canvas.getActiveObject())
        const canvCenter = canvas.getCenter()
        fabric.Image.fromURL(cropped, img => {
            canvas.add(img)
            canvas.requestRenderAll()
        }, {
            left: canvCenter.left,
            top: canvCenter.top,
            originX: 'center',
            originY: 'center',
        })
    }
}

const download = (canvas) => {
    let dataURL = canvas.toDataURL({
        format: "png"
    });
    console.log(dataURL);
    const link = document.createElement('a');
    link.download = pname+'.png';
    link.href = dataURL;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
const zoomIn = (canvas) =>{
    let zoomVal = canvas.getZoom();
    zoomVal += 0.1;
    canvas.setZoom(zoomVal);
}
const zoomOut = (canvas) =>{
    let zoomVal = canvas.getZoom();
    zoomVal -= 0.1;
    canvas.setZoom(zoomVal);
}


const canvas = initCanvas('canvas')

document.onkeydown = function(e) {
    let activeObj = canvas.getActiveObject();
    if (activeObj) {
        if(e.key=='Delete') {
            canvas.remove(activeObj);   
        } 
        canvas.requestRenderAll();
    }
  }

if(canvas.getActiveObject()){
    if(canvas.getActiveObject().type=='i-text')
        fontSelect.style.display = 'inline'
}

const picker = document.getElementById('colorPicker')
const pickColor = () => {
    picker.click();
}
picker.addEventListener('input', (event) => {
    color = event.target.value
    document.getElementById("colorIcon").style.color = color;
    const selectedObj = canvas.getActiveObject();
    if(selectedObj){
        selectedObj.fill = color;
        selectedObj.color = color;
        canvas.setActiveObject(selectedObj);
    }
    canvas.requestRenderAll()
});

const moveLayer = (canvas, val) => {
    const activeObj = canvas.getActiveObject();
    if(val===1){
        activeObj.bringForward();
        
    }
    else{
        activeObj.sendBackwards();
    }
    canvas.renderAll()
}
let undoStack = [];
let redoStack = [];

canvas.on("object:added", function (obj) {
    saveState();
});
canvas.on("object:modified", function () {
    console.log("something changed")
    saveState();
});
canvas.on("selection:created", function (obj) {
    const selectedObj = canvas.getActiveObject();
    if(selectedObj.type=="i-text")
        fontSelect.style.display = "inline"
});

var saveState = function () {
        var jsonData = canvas.toJSON();
        var canvasAsJson = JSON.stringify(jsonData);
        undoStack.push(canvasAsJson);
};

const undo = (canvas) => {
    console.log(undoStack.length)
    // canvas.loadFromJSON(undoStack.pop(), 
    //     function () {
            // console.log(undoStack.length)
            if(undoStack.length>=2){
                
                redoStack.push(undoStack.pop());
                console.log(undoStack.length)
                var jsonData = JSON.parse(undoStack[undoStack.length-1]);
                clearCanvas(canvas);
                undoStack.length --;
                canvas.loadFromJSON(jsonData);
                
            }
            else if(undoStack.length==1){
                console.log("is one "+undoStack.length)
                redoStack.push(undoStack.pop());
                clearCanvas(canvas);
                undoStack = [];
                clearCanvas(canvas)
                document.getElementById("undo").disabled = "disabled";
            }
            else{
                console.log("is zero "+undoStack.length) 
            }
   
        }


let mousePressed = false
let color = '#000000'
const group = {}

let currentMode;

const modes = {
    pan: 'pan',
    drawing: 'drawing'
}
const reader = new FileReader()

setPanEvents(canvas)

const inputFile = document.getElementById('myImg');
inputFile.addEventListener('change', imgAdded)

const uploadImage = () => {
    inputFile.click();
}
reader.addEventListener("load", () => {
    const canvCenter = canvas.getCenter()
    fabric.Image.fromURL(reader.result, img => {
        canvas.add(img)
        canvas.requestRenderAll()        
    }, {
        left: canvCenter.left,
        top: canvCenter.top,
        originX: 'center',
        originY: 'center',
    })
})

let shapeVisible = false;
let tempVisible = false;
const shapesMenu = document.getElementById("shapesMenu");
const tempsMenu = document.getElementById("templatesMenu");

document.getElementById("shapes").addEventListener('click',(e)=>{
    if(!shapeVisible){
        shapesMenu.style.display = 'block'
        tempsMenu.style.display = 'none'
        document.getElementById("shapes").classList.add("active");
        document.getElementById("templates").classList.remove("active")
        shapeVisible = true;
        tempVisible = false;
    }
    else{
        shapesMenu.style.display = 'none'
        document.getElementById("shapes").classList.remove("active");
        shapeVisible = false;
    }
        
});

document.getElementById("templates").addEventListener('click',(e)=>{
    if(!tempVisible){
        tempsMenu.style.display = 'flex'
        shapesMenu.style.display = 'none'
        document.getElementById("templates").classList.add("active");
        document.getElementById("shapes").classList.remove("active");
        tempVisible = true;
        shapeVisible = false;
    }
    else{
        tempsMenu.style.display = 'none'
        document.getElementById("templates").classList.remove("active")
        tempVisible = false;
    }
    
});




