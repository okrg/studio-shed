window.Harp = {}
BABYLON.OBJFileLoader.OPTIMIZE_WITH_UV = true
BABYLON.OBJFileLoader.SKIP_MATERIALS = true

window.addEventListener('DOMContentLoaded', () => {

const canvas = document.getElementById('renderCanvas')
const engine = new BABYLON.Engine(canvas, true, { 
   preserveDrawingBuffer: true,
   stencil: true 
});

const createScene = function () {
  const scene = new BABYLON.Scene(engine)
  scene.useRightHandedSystem = true
    
  //Material Groups **********
  Harp.materialGroups.forEach(function (group) {
    Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
    Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)      
  })

  //Finish Groups **********
  Harp.finishGroups.forEach(function (group) {
    Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
    Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)      
  })

  //Camera **********
  Harp.camera = new BABYLON.ArcRotateCamera('camera',
    BABYLON.Tools.ToRadians(60),
    BABYLON.Tools.ToRadians(80),
    400,
    new BABYLON.Vector3(0,52,0)
  )
  //Harp.camera.zoomToMouseLocation = true
  Harp.camera.useNaturalPinchZoom = true
  Harp.camera.upperBetaLimit = Math.PI / 2
  Harp.camera.upperRadiusLimit = 800
  Harp.camera.lowerRadiusLimit = 12
  Harp.camera.angularSensibilityX = 5000
  Harp.camera.angularSensibilityY = 5000
  Harp.camera.attachControl(canvas, true)
  Harp.camera.inputs.remove(Harp.camera.inputs.attached.mousewheel);



  


  //Lighting **********
  const ambient = new BABYLON.HemisphericLight('ambient', new BABYLON.Vector3(0, 1, 0), scene)
  ambient.diffuse = new BABYLON.Color3(0.66 , 0.66, 0.66)  
  ambient.specular = new BABYLON.Color3(0.66 , 0.66, 0.66)  
  ambient.intensity = 1
  ambient.groundColor = new BABYLON.Color3(0.66 , 0.66, 0.66)  
  
  const sun = new BABYLON.DirectionalLight('sun', new BABYLON.Vector3(-1, -2, -1), scene)
  sun.position = new BABYLON.Vector3(20, 40, 20);

  const shadowGenerator = new BABYLON.ShadowGenerator(1024, sun);  
  sun.intensity = 0.5
  shadowGenerator.useExponentialShadowMap = true;
  
  
    //Sky **********
    const sky = BABYLON.MeshBuilder.CreateBox('sky', {size:3600}, scene)
    const sky_material = new BABYLON.StandardMaterial('sky_material', scene)
    sky_material.backFaceCulling = false
    sky_material.reflectionTexture = new BABYLON.CubeTexture('https://shop.studio-shed.com/assets/textures/tour', scene)
    sky_material.reflectionTexture.coordinatesMode = BABYLON.Texture.SKYBOX_MODE
    sky_material.diffuseColor = new BABYLON.Color3(0, 0, 0)
    sky_material.specularColor = new BABYLON.Color3(0, 0, 0)
    sky.material = sky_material

    
    //Ground  **********
    const ground_material = new BABYLON.StandardMaterial('ground_material')    
    const ground = BABYLON.MeshBuilder.CreateGroundFromHeightMap('ground',
      Harp.textures.groundHeightMap,
      {
        width:3600,
        height:3600,
        subdivisions: 20,
        minHeight:0,
        maxHeight: 80
      }
    )
    ground.position.y = -24
    ground_material.diffuseTexture = new BABYLON.Texture(Harp.textures.Grass_Ground)
    ground.material = ground_material
    ground_material.specularColor = new BABYLON.Color3(0, 0, 0)
    ground_material.diffuseTexture.uScale = 5
    ground_material.diffuseTexture.vScale = 5
    ground.receiveShadows = true

    const spriteManagerTrees = new BABYLON.SpriteManager('treesManager', 'https://shop.studio-shed.com/assets/textures/live_oak.png', 100, {width: 600, height: 623});
    const spriteManagerDeci = new BABYLON.SpriteManager('deciManager', 'https://shop.studio-shed.com/assets/textures/deci.png', 1, {width: 400, height: 432});
    const spriteManagerDeci2 = new BABYLON.SpriteManager('deci2Manager', 'https://shop.studio-shed.com/assets/textures/deci2.png', 1, {width: 400, height: 560});

    
    for (let i = 0; i < 25; i++) {
        const tree = new BABYLON.Sprite('tree', spriteManagerTrees)
        tree.width = BABYLON.Scalar.RandomRange(400, 600)
        tree.height = BABYLON.Scalar.RandomRange(400, 600)
        tree.position.y = BABYLON.Scalar.RandomRange(100, 200)
        tree.position.x = BABYLON.Scalar.RandomRange(-1020, -1800)
        tree.position.z = BABYLON.Scalar.RandomRange(-1800, 1800)
    }

    for (let i = 0; i < 25; i++) {
        const tree = new BABYLON.Sprite('tree', spriteManagerTrees);
        tree.width = BABYLON.Scalar.RandomRange(400, 600)
        tree.height = BABYLON.Scalar.RandomRange(400, 600)
        tree.position.y = BABYLON.Scalar.RandomRange(100, 200)
        tree.position.x = BABYLON.Scalar.RandomRange(-1800, 1800)
        tree.position.z = BABYLON.Scalar.RandomRange(-1020, -1800)
    }
    for (let i = 0; i < 25; i++) {
        const tree = new BABYLON.Sprite('tree', spriteManagerTrees);
        tree.width = BABYLON.Scalar.RandomRange(400, 600)
        tree.height = BABYLON.Scalar.RandomRange(400, 600)
        tree.position.y = BABYLON.Scalar.RandomRange(100, 200)
        tree.position.x = BABYLON.Scalar.RandomRange(-1800, 1800)
        tree.position.z = BABYLON.Scalar.RandomRange(1020, 1800)
    }


    for (let i = 0; i < 25; i++) {
        const tree = new BABYLON.Sprite('tree', spriteManagerTrees);
        tree.width = BABYLON.Scalar.RandomRange(400, 600)
        tree.height = BABYLON.Scalar.RandomRange(400, 600)
        tree.position.y = BABYLON.Scalar.RandomRange(100, 200)
        tree.position.x = BABYLON.Scalar.RandomRange(1020, 1800)
        tree.position.z = BABYLON.Scalar.RandomRange(-1800, 1800)
    }

    
    
    const deci = new BABYLON.Sprite('deci', spriteManagerDeci);
    deci.width = 400
    deci.height = 423
    deci.position.y = 200
    deci.position.x = -700
    deci.position.z = -600

    const deci2 = new BABYLON.Sprite('deci2', spriteManagerDeci2);
    deci2.width = 400
    deci2.height = 560
    deci2.position.y = 250
    deci2.position.x = 700
    deci2.position.z = -640  

    Harp.deckContainer = new BABYLON.AssetContainer(scene)
    BABYLON.SceneLoader.ImportMesh('', 'https://shop.studio-shed.com/assets/models/outdoor/', 'deck.obj', scene, function (newMeshes) {
      newMeshes.forEach(function (m){
        Harp.deckContainer.meshes.push(m)
        m.receiveShadows = true
        Harp.materialGroups.forEach(function (group){        
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })

        Harp.shadowGroups.forEach(function (group) {
          if(m.name.includes(group)) {
            shadowGenerator.getShadowMap().renderList.push(m)
          }
        })

        m.position.x = 210
        m.position.y = -66
        m.position.z = 394
      })
      
    })

    Harp.fenceContainer = new BABYLON.AssetContainer(scene)
    BABYLON.SceneLoader.ImportMesh('', 'https://shop.studio-shed.com/assets/models/outdoor/', 'fence.obj', scene, function (newMeshes) {
      newMeshes.forEach(function (m){
        m.receiveShadows = true
        
        Harp.fenceContainer.meshes.push(m)
        Harp.materialGroups.forEach(function (group){
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })
        m.position.x = 100
        m.position.y = -30
        m.position.z = -340
      })
    })
  




  Harp.createRoof = function () {
    //BABYLON.OBJFileLoader.SKIP_MATERIALS = true
    if(Harp.roofContainer == null) {
      Harp.roofContainer = new BABYLON.AssetContainer(scene)
    } else {
      Harp.roofContainer.dispose()
    }
    BABYLON.SceneLoader.ImportMesh('', 'https://shop.studio-shed.com/assets/models/' + window.recipe.model + '/roof/', window.recipe.roof.model + '.obj', scene, function (newMeshes) {
      newMeshes.forEach(function (m){
        shadowGenerator.getShadowMap().renderList.push(m);
        Harp.roofContainer.meshes.push(m)
        Harp.materialGroups.forEach(function (group){
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })
        
        //console.log(m.name);

        if (window.recipe.model === 'signature') {
          m.rotation.y = BABYLON.Tools.ToRadians(90)
        }

        m.position.x = window.recipe.roof.x
        m.position.y = window.recipe.roof.y
        m.position.z = window.recipe.roof.z
        
      })
    })
  }

  Harp.importBathroom = function(sku, side) {
    //BABYLON.OBJFileLoader.SKIP_MATERIALS = true
    let x,z      
    z = -((window.recipe.floor.depth/2) - 6)
    if(side === 'R') {
      x = ((window.recipe.floor.width/2) - 6)
    }
    if(side === 'L') {
      x = -((window.recipe.floor.width/2) - 6)
    }
    BABYLON.SceneLoader.ImportMeshAsync('', 'https://shop.studio-shed.com/assets/models/summit/interior/', sku + '-' + side + '.obj', scene).then((result) => {
      result.meshes.forEach(function (m){
        //console.log(m.name);
        Harp.interiorContainer.meshes.push(m)

        Harp.finishGroups.forEach(function (group){
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })        
        m.position.x = x
        m.position.y = -8
        m.position.z = z        
      })

      Harp.setColor('white', Harp.colors['white'])
      Harp.setColor('black', Harp.colors['black'])
      Harp.setColor('glass', Harp.colors['glass'])
      Harp.setColor('fixture', Harp.colors[Harp.config.fixture_finish])
      Harp.setColor('fixture1', Harp.colors[Harp.config.fixture_finish])
      
      Harp.bathroom_floor_material.diffuseTexture = new BABYLON.Texture(Harp.textures[Harp.config.bath_flooring])
      Harp.bathroom_floor_material.diffuseTexture.uScale = 0.05
      Harp.bathroom_floor_material.diffuseTexture.vScale = 0.025
      Harp.bathroom_floor_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.bathroom_floor_material.specularPower = 32      

    })
  }

  Harp.importKitchen = function(sku, side) {
    //BABYLON.OBJFileLoader.SKIP_MATERIALS = true
    let x,z
    z = -((window.recipe.floor.depth/2) - 6)
    if(side === 'R') {
      x = ((window.recipe.floor.width/2) - 6)
    }
    if(side === 'L') {
      x = -((window.recipe.floor.width/2) - 6)
    }
    BABYLON.SceneLoader.ImportMeshAsync('', 'https://shop.studio-shed.com/assets/models/summit/interior/', sku + '-' + side + '.obj', scene).then((result) => {
      
      result.meshes.forEach(function (m){
        //console.log(m.name);
        Harp.interiorContainer.meshes.push(m)

        Harp.finishGroups.forEach(function (group){
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })
        m.position.x = x
        m.position.y = -9
        m.position.z = z
      })
      Harp.setColor('appliance', Harp.colors['appliance'])
      Harp.setColor('white', Harp.colors['white'])
      Harp.setColor('black', Harp.colors['black'])
      Harp.setColor('glass', Harp.colors['glass'])
      Harp.setColor('fixture', Harp.colors[Harp.config.fixture_finish])
      Harp.setColor('fixture1', Harp.colors[Harp.config.fixture_finish])
      Harp.setColor('cabinet', Harp.colors[Harp.config.cabinet_finish])
      Harp.cabinet_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.cabinet_material.specularPower = 16

      Harp.counter_material.diffuseTexture = new BABYLON.Texture(Harp.textures[Harp.config.countertop_finish])
      Harp.counter_material.diffuseTexture.uScale = 0.03
      Harp.counter_material.diffuseTexture.vScale = 0.03
    })
  }

  Harp.createFlooring = function() {
    if(Harp.floorContainer == null) {
      Harp.floorContainer = new BABYLON.AssetContainer(scene)
    } else {
      Harp.floorContainer.dispose()
    }
    var faceUV = new Array(6);
    for (var i = 0; i < 6; i++) {
      faceUV[i] = new BABYLON.Vector4(0, 0, 0, 0);
    }
    faceUV[4] = new BABYLON.Vector4(0, 0, 1, 1);
    Harp.floorMesh = BABYLON.MeshBuilder.CreateBox('floor', {
      width: window.recipe.floor.width, 
      height: 1, 
      depth: window.recipe.floor.depth,
      faceUV: faceUV
    })
    Harp.floorMesh.position.y = -9.25
    Harp.floorContainer.meshes.push(Harp.floorMesh)
    Harp.floor_material = new BABYLON.StandardMaterial('floor_material', scene)
    Harp.floor_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.floor_material.specularPower = 32
    Harp.floor_material.diffuseTexture = new BABYLON.Texture(Harp.textures.concrete)
    Harp.floor_material.diffuseTexture.uScale = 1
    Harp.floor_material.diffuseTexture.vScale = 1
    Harp.floorMesh.material = Harp.floor_material
  }

  //Insert interior **********
  Harp.importInteriorLayout = function (sku) {
    if(Harp.interiorContainer) {
      Harp.interiorContainer.dispose()
    }
    
    Harp.unlockSide('back')
    Harp.unlockSide('left')
    Harp.unlockSide('right')


    if(sku === 'shell-only') {
      Harp.lifestyle.setEnabled(false);
      Harp.config.interior_kit_price = 0
      Harp.floor_material.diffuseTexture = new BABYLON.Texture(Harp.textures.concrete)
      if(Harp.interiorContainer) {
        Harp.interiorContainer.dispose()
      }      
      return
    }
    
    Harp.lifestyle.setEnabled(true);
    Harp.config.interior_kit_price =  Harp.retail.lifestyle
    Harp.floor_material.diffuseTexture = new BABYLON.Texture(Harp.textures[Harp.config.main_flooring])
    Harp.floor_material.diffuseTexture.uScale = 10
    Harp.floor_material.diffuseTexture.vScale = 5
    Harp.interiorContainer = new BABYLON.AssetContainer(scene)

    if(sku === 'KIT-MM-R') {
      Harp.config.interior_kit_price = Harp.retail.kitchen
      Harp.importKitchen('KIT-MED', 'R')
      Harp.importBathroom('BAT-MED', 'R')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('right')      
    }

    if(sku === 'KIT-MM-L') {
      Harp.config.interior_kit_price = Harp.retail.kitchen
      Harp.importKitchen('KIT-MED', 'L')
      Harp.importBathroom('BAT-MED', 'L')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('left')      
    }


    if(sku === 'KIT-SM-R') {
      Harp.config.interior_kit_price = Harp.retail.miniKitchen
      Harp.importKitchen('KIT-MIN', 'R')
      Harp.importBathroom('BAT-MED', 'R')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('right')      
    }

    if(sku === 'KIT-SM-L') {
      Harp.config.interior_kit_price = Harp.retail.miniKitchen
      Harp.importKitchen('KIT-MIN', 'L')
      Harp.importBathroom('BAT-MED', 'L')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('left')      
    }
    if(sku === 'BAT-MED-R') {
      Harp.config.interior_kit_price = Harp.retail.bath
      Harp.importBathroom('BAT-MED', 'R')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('right')
    }
    if(sku === 'BAT-MED-L') {
      Harp.config.interior_kit_price = Harp.retail.bath
      Harp.importBathroom('BAT-MED', 'L')
      Harp.resetAndLockSide('back')
      Harp.resetAndLockSide('left')      
    }

  }

  //Flooring **********
  Harp.createFoundation = function () {
    Harp.foundation_material = new BABYLON.StandardMaterial('foundation_material', scene)
    

    if(Harp.foundationContainer == null) {
      Harp.foundationContainer = new BABYLON.AssetContainer(scene)
    } else {
      Harp.foundationContainer.dispose()
    }


    Harp.foundationMesh = BABYLON.MeshBuilder.CreateBox('foundation', {
      width: window.recipe.floor.width, 
      height: 0.2, 
      depth: window.recipe.floor.depth,        
    })
    Harp.foundationMesh.position.y = -9.25
    Harp.foundationContainer.meshes.push(Harp.foundationMesh)
    Harp.foundationMesh.material = Harp.foundation_material      
    Harp.foundation_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.foundation_material.specularPower = 32
    
   
  }


  //Insert panel **********
  Harp.importAndPositionPanel = function (side,slotName,panelName = 'default', panelPrice = 0) {
    //BABYLON.OBJFileLoader.SKIP_MATERIALS = true
    if (window[slotName]) { window[slotName].dispose() }      
    let slotData = window.recipe[side].find(({ slot }) => slot === slotName )  
    let panel 
    let price = 0


    if(panelName === 'default') {
      if(Harp.config.config_uid === undefined) {
        panel = slotData.model
      } else {
        panel = Harp.config[side].slots[slotName].panel        
      }
    } else {
      panel = panelName
      price = panelPrice
    }
    if(Harp.config[side].price) {
      Harp.config[side].price += parseFloat(price)
    } else {
      Harp.config[side].price = parseFloat(price)
    }
    Harp.config[side].slots[slotName] = {
      panel: panel,
      price: price,
      description: null
    }
    
    BABYLON.SceneLoader.ImportMesh('', 'https://shop.studio-shed.com/assets/models/' + window.recipe.model + '/' + side + '/', panel + '.obj', scene, function (newMeshes) {
      window[slotName] = new BABYLON.AssetContainer(scene)
      newMeshes.forEach(function (m){
        //if(side === 'front') {
        //  console.log(m.name)
        //}
        shadowGenerator.getShadowMap().renderList.push(m);
        window[slotName].meshes.push(m)
        Harp.materialGroups.forEach(function (group){
          if (m.name.includes(group)) {
            m.parent = Harp[group]
            m.material = Harp[group + '_material']
          }
        })

        if (side === 'right') {
          m.rotation.y = BABYLON.Tools.ToRadians(90)
        }

        if (side === 'left') {
          m.rotation.y = BABYLON.Tools.ToRadians(270)
        }

        if (side === 'back' && window.recipe.model === 'portland') {
          m.rotation.y = BABYLON.Tools.ToRadians(180)
        }

        m.position.z = slotData.z
        m.position.y = slotData.y
        m.position.x = slotData.x
      })
    })
  }


  //Screenshot tool *********
  Harp.pushScreenshot = async function() {
    Harp.screenshotData = { config_uid: Harp.config.config_uid || null }
    const response = fetch('/api/screenshot', {
      method: 'POST',
      body: JSON.stringify(Harp.screenshotData),
      headers: {
        'Content-Type': 'application/json'
      }
    })
    return true
  }

  Harp.resetAndLockSide = function(side) {
    
    Harp.generatePanelMenu(side)
    if (window[side]) {
      window[side].dispose()
    } else {
      window[side] = new BABYLON.AssetContainer(scene)
    }        
    window.recipe[side].forEach(function (item,index){
      Harp.importAndPositionPanel(side, item.slot, item.model)
    })
    Harp.updateElevationConfig(side)
    
    Harp['lock_' + side] = true
  }

  Harp.unlockSide = function(side) {
    Harp['lock_' + side] = false
  }

  //Default routine  **********
  Harp.useRecipe = function () {
    if(Harp.config.config_uid === undefined) {
      Harp.config.product = window.recipe.model      
      Harp.config.size = window.recipe.size
      Harp.config.area = window.recipe.length * window.recipe.depth
      Harp.config.length = window.recipe.length
      Harp.config.depth = window.recipe.depth
      Harp.config.product_size = Harp.ucfirst(window.recipe.model) + ' ' + Harp.config.size
      Harp.config.shell_base_price = window.recipe.shell_base_price
      Harp.config.shell_base_code = window.recipe.depth + 'x' + window.recipe.length + ' ' + Harp.ucfirst(window.recipe.model)
      Harp.config.front = {}
      Harp.config.front.slots = {}
      Harp.config.back = {}
      Harp.config.back.slots = {}
      Harp.config.left = {}
      Harp.config.left.slots = {}
      Harp.config.right = {}
      Harp.config.right.slots = {}
      Harp.config.interior = []

      Harp.config.stock_model = null
      

      if(typeof Harp.config.siding_label === 'undefined') {
        Harp.config.siding_label = 'Lap Siding'
        Harp.config.siding = 'lap'
        Harp.config.siding_price = 0
        Harp.config.siding_code = 'LP'
      }

      if(typeof Harp.config.siding_color === 'undefined') {
        Harp.config.siding_color = 'iron-gray'
        Harp.config.siding_color_label = 'Iron Gray'      
        Harp.config.siding_color_price = 0
        Harp.config.siding_color_code = 'IG'
      }

      if(typeof Harp.config.door_color === 'undefined') {
        Harp.config.door_color = 'factory-primed-white'
        Harp.config.door_color_label = 'Factory Primed White'    
        Harp.config.door_color_price = 0
        Harp.config.door_color_code = 'FP'
      }

      if(typeof Harp.config.eaves_color === 'undefined') {
        Harp.config.eaves_color = 'unfinished-eaves'
        Harp.config.eaves_color_label = 'Unfinished'
        Harp.config.eaves_color_price = 0
        Harp.config.eaves_color_code = 'SDUE'
      }


      if(typeof Harp.config.soffit_color === 'undefined') {
        Harp.config.soffit_color = 'iron-gray'
        Harp.config.soffit_color_label = 'Iron Gray'
        Harp.config.soffit_color_price = 0
        Harp.config.soffit_color_code = 'IG'
      }

      if(typeof Harp.config.fascia_color === 'undefined') {
        Harp.config.fascia_color = 'iron-gray'
        Harp.config.fascia_color_label = 'Iron Gray'      
        Harp.config.fascia_color_price = 0
        Harp.config.fascia_color_code = 'IG'
      }

      if(typeof Harp.config.trim_color === 'undefined') {
        Harp.config.trim_color = 'aluminum'
        Harp.config.trim_color_label = 'Clear Anodized Aluminum'      
        Harp.config.trim_color_price = 0
        Harp.config.trim_color_code = 'CA'
        Harp.config.window_casement_label = 'Pebble Gray'
        Harp.config.window_casement = 'pebble-gray'
      }

      if(typeof Harp.config.metal_wainscot === 'undefined') {
        Harp.config.metal_wainscot = false
      }

      if(typeof Harp.config.interior_kit === 'undefined') {
        Harp.config.interior_kit = 'shell-only'
        Harp.config.interior_kit_label = 'None'
        Harp.config.interior_kit_code = null
        Harp.config.interior_kit_price = 0

        //default interior selections
        Harp.config.main_flooring = 'sandcastle-oak'
        Harp.config.main_flooring_label = 'Sandcastle Oak'
        Harp.config.main_flooring_code = 'SAOA'

        Harp.config.bath_flooring = 'ice-fog'
        Harp.config.bath_flooring_label = 'Ice Fog'
        Harp.config.bath_flooring_code = 'ICFO'

        Harp.config.countertop_finish = 'silverstone'
        Harp.config.countertop_finish_label = 'Silverstone'
        Harp.config.countertop_finish_code = 'SS'

        Harp.config.cabinet_finish = 'white-shaker'
        Harp.config.cabinet_finish_label = 'White Shaker'
        Harp.config.cabinet_finish_code = 'WS'

        Harp.config.fixture_finish = 'matte-black'
        Harp.config.fixture_finish_label = 'Matte Black'
        Harp.config.fixture_finish_code = 'MB'
      }

      Harp.config.exterior_addon_label = 'None'
      Harp.config.exterior_addon = 'none'
      Harp.config.exterior_addon_price = 0

      Harp.config.roof_addon_label = 'None'
      Harp.config.roof_addon = 'none'
      Harp.config.roof_addon_price = 0

      Harp.config.window_addon_label = 'None'
      Harp.config.window_addon = 'none'
      Harp.config.window_addon_qty = 0
      Harp.config.window_addon_price = 0  

      Harp.config.permit_plans = null
      Harp.config.permit_plans_label = null
      Harp.config.permit_plans_price = 0
      Harp.config.product_total = 0

      
    } else {

      Harp.config.product = window.recipe.model
     

      Harp.config.size = window.recipe.size
      Harp.config.area = window.recipe.length * window.recipe.depth        
      Harp.config.length = window.recipe.length
      Harp.config.depth = window.recipe.depth
      Harp.config.product_size = Harp.ucfirst(window.recipe.model) + ' ' + Harp.config.size
      Harp.config.shell_base_price = window.recipe.shell_base_price
      Harp.config.shell_base_code = `${window.recipe.depth}x${window.recipe.length} ${Harp.ucfirst(window.recipe.model)}`
    }
    //Clear all possible slots of panels and start fresh each time
    let possibleSlots = ['f1','f2','f3','f4','f5','f6','f7','f8','f9','f10','b1','b2','b3','b4','b5','b6','b7','b8','b9','b10','l1','l2','l3','l4','l5','r1','r2','r3','r4','r5']
    possibleSlots.forEach(function(item){
      if(typeof window[item] !== 'undefined') {
        window[item].dispose()
      }
    })
    Harp.createRoof()
    Harp.createFoundation()
    Harp.createFlooring()  
    Harp.sides.forEach(function (side){
      Harp.generatePanelMenu(side)
      if (window[side]) {
        window[side].dispose()
      } else {
        window[side] = new BABYLON.AssetContainer(scene)
      }        
      window.recipe[side].forEach(function (item,index){
        Harp.importAndPositionPanel(side, item.slot, item.model)
      })
      Harp.updateElevationConfig(side)
    })





  }


  let configdata
  Harp.loadDefaultRecipe()

  return scene
}
let recipe
let idx
const Harp = {
  roofVisible: true,
  sides: ['front', 'back', 'left', 'right'],
  config: {},
  configItems: [
    'model',  
    'interior_kit',
    'siding',    
    'siding_color',
    'door_color',  
    'eaves_color',
    'soffit_color',
    'fascia_color',
    'trim_color',
    'main_flooring',
    'bath_flooring',
    'cabinet_finish',
    'countertop_finish',
    'fixture_finish',
    'exterior_addon',
    'window_addon',
    'roof_addon',
    'installation',
    'foundation',
    'permit_plans'
  ],
  configCosts: [
    'shell_base_price',
    'front_price',
    'back_price',
    'left_price',
    'right_price',
    'interior_kit_price',
    'siding_price',
    'siding_color_price',
    'door_color_price',
    'eaves_color_price',
    'soffit_color_price',
    'fascia_color_price',
    'trim_color_price',
    'exterior_addon_price',
    'window_addon_price',
    'roof_addon_price',
    'addons_price',
    'shipping_price',
    'permit_plans_price',
    'installation_price',
    'product_cost',
    //'discount',
    //'promo_cost',
    'initial_estimate',
  ],
  panelWidthMap: {
    'R10': 120,
    'R12': 144,
    'RT1C': 72,
    'RT2L': 48,
    'RT3R': 48,
    'RT3C': 48,    
    'RT4R': 72,
    'RT5L': 72,
    'RT6R': 48,
    'RT7L': 24,
    'L10': 120,
    'L12': 144,
    'LT1C': 72,
    'LT2R': 48,
    'LT3L': 48,
    'LT3C': 48,
    'LT4L': 72,
    'LT5R': 72,
    'LT6L': 48,
    'LT7R': 24,
    'FL06L': 6,
    'FL06R': 6,
    'F16': 192,
    'F12': 144,
    'FL12C': 12,
    'FL12L': 12,
    'FL12R': 12,
    'FL18L': 18,
    'FL18R': 18,
    'FL72C': 72,
    'FL72L': 72,
    'FL72R': 72,
    'FL84L': 84,   
    'FL84C': 84,
    'FL84R': 84,
    'FM12C': 12,
    'FM12L': 12,
    'FM12R': 12,
    'FM18L': 18,
    'FM18R': 18,
    'FM72C': 72,
    'FM72L': 72,
    'FM72R': 72,
    'FM84C': 84,
    'FM84L': 84,
    'FM84R': 84,
    'B10x12': 144,
    'B12x16': 192,
    'BT20L-06': 6,
    'BT20R-06': 6,
    'BT20C-96': 96,
    'BT20C-48': 48,
    'BT16L-06': 6,
    'BT16R-06': 6,
    'BT16C-96': 96,
    'BT16C-48': 48,
    'BT12L-06': 6,
    'BT12R-06': 6,
    'BT12C-96': 96,
    'BT12C-48': 48
  },
  sgFauxMap: {
    'F12-W2L-D36CL': ['F23-W2A','F33-D36R-C','F33-C','F23-B'],
    'F12-D36CR-W2R': ['F23-A','F33-C','F33-D36L-C','F23-W2B'],
    'F12-D36L': ['F33-D36R-A','F63-C','F33-B'],
    'F12-D36R': ['F33-A','F63-C','F33-D36L-B'],
    'F12-D72C': ['F27L-A','F72-A','F27R-B'],
    'F12-W2L-D72C-W2R': ['F27L-W2A','F72-B','F27R-W2B'],
    'F16-W2L-D36CL': ['F23-W2A','F33-D36R-C','F63-C','F33-C','F23-B'],
    'F16-D36CR-W2R': ['F23-A','F33-C','F63-C','F33-D36L-C','F23-W2B'],
    'F16-D36L': ['F33-D36R-A','F63-C','F63-C','F33-B'],
    'F16-D36R': ['F33-A','F63-C','F63-C','F33-D36L-B'],
    'F16-D72C': ['F23-A','F27L-C','F72-A','F27R-C','F23-B'],
    'F16-W2L-D72C-W2R': ['F23-A','F27L-W2C','F72-B','F27R-W2C','F23-B'],
    'F16-36L-D36R': ['F33-36-A','F63-C','F63-C','F33-D36L-B'],
    'F16-D36L-36R': ['F33-D36R-A','F63-C','F63-C','F33-36-B'],
    'F20-W2L-D36CL': ['F23-W2A','F33-D36R-C','F63-C','F63-C','F33-C','F23-B'],
    'F20-D36CR-W2R': ['F23-A','F33-C','F63-C','F63-C','F33-D36L-C','F23-W2B'],
    'F20-D36L': ['F33-D36R-A','F63-C','F63-C','F63-C','F33-B'],
    'F20-D36R': ['F33-A','F63-C','F63-C','F63-C','F33-D36L-B'],
    'F20-D72C': ['F63-A','F27L-C','F72-A','F27R-C','F63-B'],
    'F20-W2L-D72C-W2R': ['F63-A','F27L-W2C','F72-B','F27R-W2C','F63-B'],
    'B08x12-18L-18R': ['B08-3L-18C','B08-6','B08-3R-18C'],
    'B08x12': ['B08-3L','B08-6','B08-3R'],
    'B08x16-18L-18R': ['B08-3L-18C','B08-6','B08-6','B08-3R-18C'],
    'B08x16': ['B08-3L','B08-6','B08-6','B08-3R'],
    'B10x12-18L-18R': ['B10-3L-18C','B10-6','B10-3R-18C'],
    'B10x12': ['B10-3L','B10-6','B10-3R'],
    'B10x16-18L-18R': ['B10-3L-18C','B10-6','B10-6','B10-3R-18C'],
    'B10x16': ['B10-3L','B10-6','B10-6','B10-3R'],
    'B10x20-18L-18R': ['B10-3L-18C','B10-6','B10-6','B10-6','B10-3R-18C'],
    'B10x20': ['B10-3L','B10-6','B10-6','B10-6','B10-3R'],
    'B12x12-18L-18R': ['B12-3L-18C','B12-6','B12-3R-18C'],
    'B12x12': ['B12-3L','B12-6','B12-3R'],
    'B12x16-18L-18R': ['B12-3L-18C','B12-6','B12-6','B12-3R-18C'],
    'B12x16': ['B12-3L','B12-6','B12-6','B12-3R'],
    'B12x20-18L-18R': ['B12-3L-18C','B12-6','B12-6','B12-6','B12-3R-18C'],
    'B12x20': ['B12-3L','B12-6','B12-6','B12-6','B12-3R'],
    'L08': ['L1','L2'],
    'L08-W2R': ['L1','L2-W2'],
    'L08-18C': ['L1-18C','L2'],
    'L08-36C': ['L1-36C','L2'],
    'L10': ['L3','L1','L2'],
    'L10-W2R': ['L3','L1','L2-W2'],
    'L10-18C': ['L3','L1-18C','L2'],
    'L10-36C': ['L3','L1-36C','L2'],
    'L10-18C-W2R': ['L3','L1-18C','L2-W2'],
    'L10-36C-W2R': ['L3','L1-36C','L2-W2'],
    'L12': ['L4','L1','L2'],
    'L12-W2R': ['L4','L1','L2-W2'],
    'L12-18C': ['L4','L1-18C','L2'],
    'L12-36C': ['L4','L1-36C','L2'],
    'L12-18C-W2R': ['L4','L1-18C','L2-W2'],
    'L12-36C-W2R': ['L4','L1-36C','L2-W2'],
    'R08': ['R2','R1'],
    'R08-W2L': ['R2-W2','R1'],
    'R08-18C': ['R2','R1-18C'], 
    'R08-36C': ['R2','R1-36C'],
    'R10': ['R2','R1','R3'],
    'R10-W2L': ['R2-W2','R1','R3'],
    'R10-18C': ['R2','R1-18C','R3'],
    'R10-36C': ['R2','R1-36C','R3'],
    'R10-W2L-18C': ['R2-W2','R1-18C','R3'],
    'R10-W2L-36C': ['R2-W2','R1-36C','R3'],
    'R12': ['R2','R1','R4'],
    'R12-W2L': ['R2-W2','R1','R4'],
    'R12-18C': ['R2','R1-18C','R4'],
    'R12-36C': ['R2','R1-36C','R4'],
    'R12-W2L-18C': ['R2-W2','R1-18C','R4'],
    'R12-W2L-36C': ['R2-W2','R1-36C','R4']
  },
  ptFauxMap: {    
    'PF16-4-W3-D72C': ['PF16-4-W3-D72C','p2','p3'],
    'PF16-4-W3': ['PF16-4-W3','p2','p3'],
    'PF12-4-W3-D72C': ['PF12-4-W3-D72C','p2','p3'],
    'PF12-4-W3': ['PF12-4-W3','p2','p3'],
    'PL10': ['PL10','p2','p3'],
    'PL10-36C': ['PL10-36C','p2','p3'],
    'PR10': ['PR10','p2','p3'],
    'PR10-36C': ['PR10-36C','p2','p3'],
    'PL12': ['PL12','p2','p3'],
    'PL12-36C': ['PL12-36C','p2','p3'],
    'PL16-36C': ['PL16-36C','p2','p3'],
    'PR12': ['PR12','p2','p3'],
    'PR12-36C': ['PR12-36C','p2','p3'],
    'PR16-36C': ['PR16-36C','p2','p3'],
    'PB10': ['PB10','p2','p3'],
    'PB10-36C': ['PB10-36C','p2','p3'],
    'PB12': ['PB12','p2','p3'],
    'PB12-36C': ['PB12-36C','p2','p3'],
    'PB12-2-W3': ['PB12-2-W3','p2','p3'],
    'PB16': ['PB16','p2','p3'],
    'PB16-2-W3': ['PB16-2-W3','p2','p3'],
  },
  retail: {
    'lifestyle': 0,
    'bath': 0,
    'miniKitchen': 0,
    'kitchen': 0,
    'bedroom': 0
  },
  bomCodes: {
    'iron-gray': '08',
    'pearl-gray': '07',
    'arctic-white': '01',
    'countrylane-red': '04',
    'rich-espresso': '03',
    'timber-bark': '05',
    'cobble-stone': '02',
    'heathered-moss': '06',
    'unfinished-eaves': 'SDUE',
    'factory-primed-white': 'SDFP',
    'ashlar-oak': '01',
    'sandcastle-oak': '02',
    'fawn-chestnut': '04',
    'knotted-chestnut': '05',
    'natural-hickory': '06',
    'fumed-hickory': '07',
    'cedar-chestnut': '03',
    'gothic-arch': 'BA02',
    'ice-fog': 'BA03',
    'stone-grey': 'BA01',
    'yuri-grey': 'YG',
    'silverstone': 'SS',
    'merino-grey': 'MG',
    'matte-black': 'MB',
    'satin-nickel': 'BN',
    'white-shaker': 'WS',
    'grey-shaker': 'GS',
    'aluminum': 'CA',
    'studio-shed-bronze': 'BZ',
    'signature': 'SG',
    'portland': 'PT',
    'summit': 'SM'
  },
  frontElevationCodes: {
    20: 'FL',
    18: 'FL',
    16: 'FM',
    14: 'FS'
  },
  backElevationCodes: {
    20: 'BT20x',
    18: 'BT16x',
    16: 'BT16x',
    14: 'BT12x'
  },
  labels: {
    'iron-gray': 'Iron Gray',
    'pearl-gray': 'Pearl Gray',
    'arctic-white': 'Arctic White',
    'countrylane-red': 'Countrylane Red',
    'rich-espresso': 'Rich Espresso',
    'timber-bark': 'Timber Bark',
    'cobble-stone': 'Cobble Stone',
    'heathered-moss': 'Heathered Moss',
    'electric-lime': 'Electric Lime',
    'relentless-olive': 'Relentless Olive',
    'tricorn-black': 'Tricorn Black',
    'yam': 'Yam',
    'naval': 'Naval',
    'fireworks': 'Fireworks',
    'forsythia': 'Forsythia',
    'unfinished-eaves': 'Unfinished',
    'natural-stain': 'Natural Stain',
    'charwood-stain': 'Charwood Stain',
    'factory-primed-white': 'Factory Primed White',
    'sandcastle-oak': 'Sandcastle Oak',
    'fawn-chestnut': 'Fawn Chestnut',
    'knotted-chestnut': 'Knotted Chestnut',
    'natural-hickory': 'Natural Hickory',
    'fumed-hickory': 'Fumed Hickory',
    'cedar-chestnut': 'Cedar Chestnut',
    'gothic-arch': 'Gothic Arch',
    'ice-fog': 'Ice Fog',
    'stone-grey': 'Stone Grey',
    'yuri-grey': 'Yuri Grey',
    'silverstone': 'Silverstone',
    'merino-grey': 'Merino Grey',
    'matte-black': 'Matte Black',
    'satin-nickel': 'Satin Nickel',
    'white-shaker': 'White Shaker',
    'grey-shaker': 'Grey Shaker',
    'aluminum': 'Clear Anodized Aluminum',
    'studio-shed-bronze': 'Bronze',
    'pebble-gray': 'Pebble Gray',
    'ebony': 'Ebony',
    'LS': 'Lifestyle',
    'ST': 'Standard'
  },
  colors: {
    'pink': 'rgb(255, 20, 255)',
    'iron-gray': 'rgb(82, 83, 86)',
    'pearl-gray': 'rgb(177, 178, 176)',
    'arctic-white': 'rgb(235, 236, 238)',
    'countrylane-red': 'rgb(110, 57, 41)',
    'rich-espresso': 'rgb(91, 87, 82)',
    'timber-bark': 'rgb(122, 114, 93)',
    'cobble-stone': 'rgb(201, 196, 180)',
    'heathered-moss': 'rgb(148, 144, 109)',
    'factory-primed-white': 'rgb(245, 245, 245)',
    'electric-lime': 'rgb(142, 195, 16)',
    'relentless-olive': 'rgb(110, 116, 59)',
    'tricorn-black': 'rgb(45, 45, 46)',
    'yam': 'rgb(197, 114, 58)',
    'naval': 'rgb(47, 61, 75)',
    'fireworks': 'rgb(215, 57, 48)',
    'forsythia': 'rgb(252, 210, 0)',
    'studio-shed-bronze': 'rgb(32, 26, 24)',
    'ebony': 'rgb(32, 32, 33)',
    'pebble-gray': 'rgb(140, 130, 110)',
    'unfinished-eaves': 'rgb(222, 222, 222)',
    'unfinished-trim': 'rgb(245, 245, 245)',
    'natural-stain': 'rgb(178, 120, 59)',
    'charwood-stain': 'rgb(75, 60, 48)',
    'cedar-plank': 'rgb(169, 107, 69)',
    'cedar-shake': 'rgb(169, 107, 69)',
    'glass': 'rgb(168, 204, 215)',
    'roof-metal': 'rgb(155, 158, 158)',
    'aluminum': 'rgb(155, 158, 158)',
    'appliance': 'rgb(207, 212, 217)',
    'satin-nickel': 'rgb(181, 182, 181)',
    'black': 'rgb(0, 0, 0)',
    'matte-black': 'rgb(0, 0, 0)',
    'white': 'rgb(255, 255, 255)',
    'fixture': 'rgb(26, 126, 126)',
    'fixture1': 'rgb(26, 126, 126)',
    'white-shaker': 'rgb(245, 241, 238)',
    'grey-shaker': 'rgb(161, 161, 159)',
    'high-gloss-white-flat': 'rgb(242, 242, 239)'
  },
  shadowGroups: [
    'Lantern',
    'Planter',    
    'TallPot',
    'ShortPot',
    'TallPlant',
    'ShortPlant',
    'PlanterPlant',
    'lounge_wood'
  ],
  materialGroups: [
    'lounge_cushion',
    'lounge_wood',
    'Deck_Light',
    'Deck_Light_Glass',
    'TallPot',
    'ShortPot',
    'FarPot',
    'TallPlant',
    'ShortPlant',
    'FarPlant',    
    'Lantern',
    'LanternGlass',
    'potsoil',
    'Planter',
    'PlanterPlant',
    'shed_Deck',
    'PAthway_C',
    'Fence',
    'Fence1',
    'Perimeter_wall',
    'Grass_Ground',
    'wood_texture',
    'wood_texture_metal',
    'wood_texture_trims',
    'wood_texture_metal_trims',
    'block_siding',
    'block_siding_color',
    'block_siding_fastener',
    'block_siding_trims',
    'block_siding_metal',
    'block_siding_metal_color',
    'block_siding_metal_fastener',
    'block_siding_metal_trims',
    'plank_siding',
    'plank_siding_trims',
    'plank_siding_color',
    'plank_trims',
    'plank_trim',
    'plank_siding_metal',
    'plank_siding_metal_trims',
    'plank_siding_metal_color',
    'trim_color',
    'metal_wainscot',
    'metal_wainscot1',
    'lifestyle',
    'lumber',
    'sheathing',
    'framing',
    'glass',
    'door_color',
    'roof_fascia',
    'roof_eave',
    'roof_metal',
    'eave_plywood',
    'eave_rafter',
    'window_exterior',
    'awning',
    'pergola'
  ],
  finishGroups: [
    'glass',
    'appliance',
    'counter',
    'cabinet',
    'white',
    'black',
    'fixture',
    'fixture1',
    'bathroom_floor'
  ],
  textures: {
    'amarili': 'https://shop.studio-shed.com/assets/textures/mata_G.jpg',
    'wood_deck': 'https://shop.studio-shed.com/assets/textures/wood_deck.jpg',
    'Grass_Ground': 'https://shop.studio-shed.com/assets/textures/Grass_Ground.jpg',
    'Perimeter_wall': 'https://shop.studio-shed.com/assets/textures/concrete.jpg',
    'Fence': 'https://shop.studio-shed.com/assets/textures/fence.jpg',
    'groundHeightMap': 'https://shop.studio-shed.com/assets/textures/gentle.png',
    'ground': 'https://shop.studio-shed.com/assets/textures/grass.jpg',
    'wood': 'https://shop.studio-shed.com/assets/textures/wood.jpg',
    'concrete': 'https://shop.studio-shed.com/assets/textures/concrete.jpg',
    'base-lap': 'https://shop.studio-shed.com/assets/textures/base_lap.png',
    'cedar-plank': 'https://shop.studio-shed.com/assets/textures/cedar-plank.jpg',
    'cedar-shake': 'https://shop.studio-shed.com/assets/textures/cedar-shake.jpg',
    'ashlar-oak': 'https://shop.studio-shed.com/assets/textures/ashlar-oak.jpg',
    'sandcastle-oak': 'https://shop.studio-shed.com/assets/textures/sandcastle-oak.jpg',
    'fawn-chestnut': 'https://shop.studio-shed.com/assets/textures/fawn-chestnut.jpg',
    'knotted-chestnut': 'https://shop.studio-shed.com/assets/textures/knotted-chestnut.jpg',
    'natural-hickory': 'https://shop.studio-shed.com/assets/textures/natural-hickory.jpg',
    'fumed-hickory': 'https://shop.studio-shed.com/assets/textures/fumed-hickory.jpg',
    'cedar-chestnut': 'https://shop.studio-shed.com/assets/textures/cedar-chestnut.jpg',
    'licorice': 'https://shop.studio-shed.com/assets/textures/licorice.jpg',
    'abyss': 'https://shop.studio-shed.com/assets/textures/abyss.jpg',
    'poetry-grey': 'https://shop.studio-shed.com/assets/textures/poetry-grey.jpg',
    'yuri-grey': 'https://shop.studio-shed.com/assets/textures/yuri-grey.jpg',
    'silverstone': 'https://shop.studio-shed.com/assets/textures/silverstone.jpg',
    'merino-grey': 'https://shop.studio-shed.com/assets/textures/merino-grey.jpg',
    'gothic-arch': 'https://shop.studio-shed.com/assets/textures/gothic-arch.jpg',
    'ice-fog': 'https://shop.studio-shed.com/assets/textures/ice-fog.jpg',
    'stone-grey': 'https://shop.studio-shed.com/assets/textures/stone-grey.jpg',
  },
  updateRecipe: function() {
    Harp.sides.forEach(function (side){
      window.recipe[side].forEach(function(item, index) {
        window.recipe[side][index].model = Harp.config[side].slots[item.slot].panel
      })
    })
    setTimeout(function() {
        window.dispatchEvent(new CustomEvent('update-permit-plan-set'))
        window.dispatchEvent(new CustomEvent('update-interior'))
        window.dispatchEvent(new CustomEvent('update-exterior'))
        window.dispatchEvent(new CustomEvent('update-addons'))
        window.dispatchEvent(new CustomEvent('update-installation-type'))
    }, 1500);


  },
  setStain: function (group, rgb) {
    rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',')
    color = new BABYLON.Color4.FromInts(rgb[0], rgb[1], rgb[2], 0.1)
    for (var i = 0; i < Harp[group].getChildMeshes(false).length; i++){
      Harp[group].getChildMeshes(false)[i].material.diffuseColor = color
    }
  },
  setColor: function (group, rgb) {
    rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',')
    color = new BABYLON.Color3.FromInts(rgb[0], rgb[1], rgb[2])
    for (var i = 0; i < Harp[group].getChildMeshes(false).length; i++){
      Harp[group].getChildMeshes(false)[i].material.diffuseColor = color
    }
  },
  setSidingColor: function(color) {
    if(Harp.config.siding == 'lap') { 
      Harp.setColor('wood_texture', Harp.colors[color])
      Harp.setColor('wood_texture_metal', Harp.colors[color])
    }    
    Harp.setColor('plank_siding', Harp.colors[color])
    Harp.setColor('plank_siding_metal', Harp.colors[color])
    Harp.setColor('plank_siding_color', Harp.colors[color])
    Harp.setColor('plank_siding_metal_color', Harp.colors[color])    
    Harp.setColor('block_siding_color', Harp.colors[color])
    Harp.setColor('block_siding_metal_color', Harp.colors[color])

    Harp.updateConfigParam('siding_color', color)
  },
  setFlooring: function(sku) {
    console.log('setting floor color', sku)
    Harp.floor_material.diffuseTexture = new BABYLON.Texture(Harp.textures[sku])
    Harp.floor_material.diffuseTexture.uScale = 10
    Harp.floor_material.diffuseTexture.vScale = 5
  },
  setDoorColor: function(color) {
    Harp.setColor('door_color', Harp.colors[color])
    Harp.updateConfigParam('door_color', color)
  }, 
  setEavesColor: function(color) {
    if(color === 'natural-stain' || color === 'charwood-stain' || color === 'unfinished-eaves') {
      Harp.setStain('eave_rafter', Harp.colors[color])
      Harp.setStain('eave_plywood', Harp.colors[color])
      let eaveWood = new BABYLON.Texture(Harp.textures.wood)
      eaveWood.uScale = eaveWood.vScale = 0.015
      Harp.eave_rafter_material.diffuseTexture = eaveWood
      Harp.eave_rafter_material.diffuseTexture = eaveWood
    } else {
      Harp.setColor('eave_rafter', Harp.colors[color])
      Harp.setColor('eave_plywood', Harp.colors[color])
      Harp.eave_rafter_material.diffuseTexture = null
      Harp.eave_plywood_material.diffuseTexture = null
    }
    Harp.updateConfigParam('eaves_color', color) 
  },
  setSoffitColor: function(color) {
    Harp.setColor('roof_eave', Harp.colors[color])
    Harp.updateConfigParam('soffit_color', color)
  },
  setFasciaColor: function(color) {
    Harp.setColor('roof_fascia', Harp.colors[color])
    Harp.updateConfigParam('fascia_color', color)
  },
  setTrimColor: function(color) {
    Harp.setColor('trim_color', Harp.colors[color])
    Harp.setColor('plank_trim', Harp.colors[color])
    Harp.setColor('plank_trims', Harp.colors[color])
    Harp.setColor('plank_siding_trims', Harp.colors[color])
    Harp.setColor('plank_siding_metal_trims', Harp.colors[color])

    Harp.setColor('wood_texture_trims', Harp.colors[color])
    Harp.setColor('wood_texture_metal_trims', Harp.colors[color])

    Harp.setColor('block_siding_trims', Harp.colors[color])
    Harp.setColor('block_siding_metal_trims', Harp.colors[color])

    Harp.setColor('roof_metal', Harp.colors[color])
    Harp.setColor('metal_wainscot', Harp.colors[color])
    Harp.setColor('metal_wainscot1', Harp.colors[color])
    if(color === 'aluminum') {
      Harp.setSoffitColor('aluminum')
      Harp.setFasciaColor('aluminum')
      Harp.setColor('window_exterior', Harp.colors['pebble-gray'])
      Harp.updateConfigParam('window_casement', 'pebble-gray', 'Pebble Gray')
    }
    if(color === 'studio-shed-bronze') {
      Harp.setSoffitColor('studio-shed-bronze')
      Harp.setFasciaColor('studio-shed-bronze')
      Harp.setColor('window_exterior', Harp.colors['tricorn-black'])
      Harp.updateConfigParam('window_casement', 'ebony', 'Ebony')
    }
    Harp.updateConfigParam('trim_color', color)
  },
  setTexture: function (group, texture) {
    Harp[group + '_material'].diffuseTexture = new BABYLON.Texture(Harp.textures[texture])
    Harp[group + '_material'].diffuseTexture.uScale = 0.03
    Harp[group + '_material'].diffuseTexture.vScale = 0.03
  },
  setSiding: function (siding) {
    //Harp['trim_color'].setEnabled(false)
    Harp.config.siding = siding
    Harp.plank_trims.setEnabled(false)
    Harp.plank_trim.setEnabled(false)
    Harp.plank_siding.setEnabled(false)
    Harp.plank_siding_color.setEnabled(false)
    Harp.plank_siding_trims.setEnabled(false)
    Harp.plank_siding_metal.setEnabled(false)
    Harp.plank_siding_metal_color.setEnabled(false)
    Harp.plank_siding_metal_trims.setEnabled(false)

    Harp.wood_texture.setEnabled(false)
    Harp.wood_texture_metal.setEnabled(false)
    Harp.wood_texture_trims.setEnabled(false)
    Harp.wood_texture_metal_trims.setEnabled(false)

    
    Harp.block_siding.setEnabled(false)
    Harp.block_siding_color.setEnabled(false)
    Harp.block_siding_fastener.setEnabled(false)
    Harp.block_siding_trims.setEnabled(false)
    
    Harp.block_siding_metal.setEnabled(false)
    Harp.block_siding_metal_color.setEnabled(false)
    Harp.block_siding_metal_fastener.setEnabled(false)
    Harp.block_siding_metal_trims.setEnabled(false)

    if (siding == 'block') {
      Harp.config.siding_price = Harp.retail.block

      if(Harp.config.metal_wainscot) {
        Harp.block_siding_metal.setEnabled(true)
        Harp.block_siding_metal_color.setEnabled(true)
        Harp.block_siding_metal_fastener.setEnabled(true)
        Harp.block_siding_metal_trims.setEnabled(true)
        Harp.config.siding_code = 'BM'
      } else {
        Harp.block_siding.setEnabled(true)
        Harp.block_siding_color.setEnabled(true)
        Harp.block_siding_fastener.setEnabled(true)
        Harp.block_siding_trims.setEnabled(true)
        Harp.config.siding_code = 'BL'
      }
      
      Harp.setColor('block_siding_color', Harp.colors[Harp.config.siding_color])
      Harp.setColor('block_siding_metal_color', Harp.colors[Harp.config.siding_color])
      
      Harp.setColor('block_siding_fastener', Harp.colors['appliance'])
      Harp.setColor('block_siding_metal_fastener', Harp.colors['appliance'])

      Harp.setColor('block_siding_trims', Harp.colors[Harp.config.trim_color])
      Harp.setColor('block_siding_metal_trims', Harp.colors[Harp.config.trim_color])

      Harp.updateConfigParam('siding', 'block', 'Block Siding')
     
    }

    if (siding == 'plank') {
      Harp.config.siding_price = Harp.retail.plank

      if(Harp.config.metal_wainscot) {
        Harp.plank_siding_metal.setEnabled(true)
        Harp.plank_siding_metal_color.setEnabled(true)
        Harp.plank_siding_metal_trims.setEnabled(true)
        Harp.config.siding_code = 'PM'
      } else {
        Harp.plank_siding.setEnabled(true)
        Harp.plank_siding_color.setEnabled(true)
        Harp.plank_trims.setEnabled(true)
        Harp.plank_trim.setEnabled(true)
        Harp.plank_siding_trims.setEnabled(true)
        Harp.config.siding_code = 'PL'
      }
      
      Harp.setColor('plank_siding_color', Harp.colors[Harp.config.siding_color]) 
      Harp.setColor('plank_siding', Harp.colors[Harp.config.siding_color])
      Harp.setColor('plank_siding_metal', Harp.colors[Harp.config.siding_color])
      Harp.setColor('plank_siding_metal_color', Harp.colors[Harp.config.siding_color])
      Harp.setColor('plank_siding_trims', Harp.colors[Harp.config.trim_color])
      Harp.setColor('plank_siding_metal_trims', Harp.colors[Harp.config.trim_color])
      Harp.updateConfigParam('siding', 'plank', 'Plank Siding')
    }
    if (siding == 'lap') {
      Harp.config.siding_price = Harp.retail.lap

      if(Harp.config.metal_wainscot) {
        Harp.wood_texture_metal.setEnabled(true)
        Harp.wood_texture_metal_trims.setEnabled(true)
        Harp.wood_texture_metal_material.diffuseTexture = new BABYLON.Texture(Harp.textures['base-lap'])
        Harp.wood_texture_metal_material.diffuseTexture.uScale = 0
        Harp.wood_texture_metal_material.diffuseTexture.vScale = 0.091
        Harp.setColor('wood_texture_metal', Harp.colors[Harp.config.siding_color])
        Harp.setColor('wood_texture_metal_trims', Harp.colors[Harp.config.trim_color])
        Harp.config.siding_code = 'LM'
      } else {
        Harp.wood_texture.setEnabled(true)
        Harp.wood_texture_trims.setEnabled(true)
        Harp.wood_texture_material.diffuseTexture = new BABYLON.Texture(Harp.textures['base-lap'])
        Harp.wood_texture_material.diffuseTexture.uScale = 0
        Harp.wood_texture_material.diffuseTexture.vScale = 0.091
        Harp.setColor('wood_texture', Harp.colors[Harp.config.siding_color])
        Harp.setColor('wood_texture_trims', Harp.colors[Harp.config.trim_color])
        Harp.config.siding_code = 'LP'
      }      
      Harp.updateConfigParam('siding', 'lap', 'Lap Siding')
    }
    if (siding == 'horiz_plank') {
      Harp.config.siding_price = Harp.retail.horiz_plank

      if(Harp.config.metal_wainscot) {
        Harp.wood_texture_metal.setEnabled(true)
        Harp.wood_texture_metal_trims.setEnabled(true)
        Harp.setColor('wood_texture_metal', Harp.colors['white'])
        Harp.setColor('wood_texture_metal_trims', Harp.colors[Harp.config.trim_color])        
        Harp.wood_texture_metal_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-plank'])
        Harp.wood_texture_metal_material.diffuseTexture.uScale = 0.0075
        Harp.wood_texture_metal_material.diffuseTexture.vScale = 0.05
        Harp.config.siding_code = 'CPM'
      } else {
        Harp.wood_texture.setEnabled(true)
        Harp.wood_texture_trims.setEnabled(true)
        Harp.setColor('wood_texture', Harp.colors['white'])
        Harp.setColor('wood_texture_trims', Harp.colors[Harp.config.trim_color])

        Harp.wood_texture_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-plank'])
        Harp.wood_texture_material.diffuseTexture.uScale = 0.0075
        Harp.wood_texture_material.diffuseTexture.vScale = 0.05  
        Harp.config.siding_code = 'CP'
      }
      
    }
    if (siding == 'cedar_shake') {
      Harp.config.siding_price = Harp.retail.cedar_shake

      if(Harp.config.metal_wainscot) {
        Harp.wood_texture_metal.setEnabled(true)
        Harp.wood_texture_metal_trims.setEnabled(true)
        Harp.setColor('wood_texture_metal', Harp.colors['white'])
        Harp.setColor('wood_texture_metal_trims', Harp.colors[Harp.config.trim_color])
        Harp.wood_texture_metal_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-shake'])
        Harp.wood_texture_metal_material.diffuseTexture.uScale = 0.05
        Harp.wood_texture_metal_material.diffuseTexture.vScale = 0.035
        Harp.config.siding_code = 'CSM'
      } else {
        Harp.wood_texture.setEnabled(true)
        Harp.wood_texture_trims.setEnabled(true)
        Harp.setColor('wood_texture', Harp.colors['white'])
        Harp.setColor('wood_texture_trims', Harp.colors[Harp.config.trim_color])
        Harp.wood_texture_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-shake'])
        Harp.wood_texture_material.diffuseTexture.uScale = 0.05
        Harp.wood_texture_material.diffuseTexture.vScale = 0.035
        Harp.config.siding_code = 'CS'
      }     
    }
    
  },
  setRoofAddon: function(addon, label) {
    let price = 0
    if(addon === 'b6') {
      price = Harp.retail.b6
    }
    Harp.config.roof_addon = addon
    Harp.config.roof_addon_label = label
    Harp.config.roof_addon_price = price
    Harp.updateConfig()
  },
  setExteriorAddon: function(addon, label) {
    let price = 0
    Harp.config.exterior_addon = addon
    Harp.config.exterior_addon_label = label
    Harp.config.exterior_addon_price = price

    Harp.metal_wainscot.setEnabled(false)
    Harp.metal_wainscot1.setEnabled(false)
    if(addon === 'none') {
      Harp.config.metal_wainscot = false
      Harp.setSiding(Harp.config['siding'], 0)
      return
    }

    Harp.config.metal_wainscot = true
    Harp.metal_wainscot.setEnabled(true)
    Harp.metal_wainscot1.setEnabled(true)
    Harp.setSiding(Harp.config['siding'], 0)
  },
  setWindowAddon: function(addon, label) {
    let price = 0
    if(addon === 'pergola') {
      price = Harp.retail.pergola
    }
    if(addon === 'awning') {
      price = Harp.retail.awning
    }    
    Harp.config.window_addon = addon
    Harp.config.window_addon_label = label
    Harp.config.window_addon_price = price    
    Harp.awning.setEnabled(false)
    Harp.pergola.setEnabled(false)
    if(addon === 'none') {
      return
    }
    Harp[addon].setEnabled(true)
    
  },
  hideRoof: function () {
    Harp.roofVisible = false
    Harp.roofContainer.removeAllFromScene()
  },
  showRoof: function () {
    if (Harp.roofVisible == false) {
      Harp.roofVisible = true
      Harp.roofContainer.addAllToScene()
    }
  },
  ucfirst: function(string) {
    return string[0].toUpperCase() + string.slice(1);
  },
  formatPrice: new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0
  }),
  setSwatchImg: function(selector, swatch) {    
    if(swatch === 'horiz_plank') {
      swatch = 'cedar-plank-siding'
    }
    if(swatch === 'cedar_shake') {
      swatch = 'cedar-shake-siding'
    }
    if(swatch === 'plank') {
      swatch = 'plank-siding'
    }
    if(swatch === 'lap') {
      swatch = 'lap-siding'
    }
    if(swatch === 'block') {
      swatch = 'block-siding'
    }
    const lineItems = document.querySelectorAll(selector)
    for (var i = 0; i < lineItems.length; i++) {
      lineItems[i].src = 'https://shop.studio-shed.com/assets/textures/' + swatch + '.jpg'
    }
  },
  setSwatchTile: function(selector, swatch) {    
    const regx = new RegExp('\\b' + 'bg-' + '[^ ]*[ ]?\\b', 'g');
    const lineItems = document.querySelectorAll(selector)
    for (var i = 0; i < lineItems.length; i++) {
      lineItems[i].className = lineItems[i].className.replace(regx, '');
      lineItems[i].classList.add('bg-'+swatch)
    }
  },  
  setText: function(selector, text) {    
    const lineItems = document.querySelectorAll(selector)
    for (var i = 0; i < lineItems.length; i++) {
      lineItems[i].textContent = text
    }
  },
  loadDefaultRecipe: async function() {
    let recipeResponse = {}
    let model = document.querySelector('#renderCanvas').getAttribute('data-studio-shed-model')
    if(model == 'boreas-10x12') {
      recipeResponse = {"model":"signature","size":"10x12","depth":10,"length":12,"name":"10x12 signature","shell_base_price":14606,"roof":{"model":"SG-10x12-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":144,"height":12,"depth":120,"x":72,"y":-9,"z":60},"front":[{"slot":"f1","model":"F12-D72C","width":144,"x":-68,"y":-9,"z":60}],"back":[{"slot":"b1","model":"B10x12","width":144,"x":-68,"y":-9,"z":-60}],"left":[{"slot":"l1","model":"L10-36C","width":120,"x":-71,"y":-9,"z":-60}],"right":[{"slot":"r1","model":"R10-36C","width":120,"x":71,"y":-9,"z":60}]}
    }
    if(model == 'boreas-12x16') {
      recipeResponse = {"model":"signature","size":"12x16","depth":12,"length":16,"name":"12x16 signature","shell_base_price":20308,"roof":{"model":"SG-12x16-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":192,"height":12,"depth":144,"x":96,"y":-9,"z":72},"front":[{"slot":"f1","model":"F16-D72C","width":144,"x":-92,"y":-9,"z":72}],"back":[{"slot":"b1","model":"B12x16","width":192,"x":-92,"y":-9,"z":-72}],"left":[{"slot":"l1","model":"L12-36C","width":144,"x":-95,"y":-9,"z":-72}],"right":[{"slot":"r1","model":"R12-36C","width":144,"x":95,"y":-9,"z":72}]}      
    }
    if(model == 'solitude-10x12') {
      recipeResponse = {"model":"signature","size":"10x12","depth":10,"length":12,"name":"10x12 signature","shell_base_price":14606,"roof":{"model":"SG-10x12-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":144,"height":12,"depth":120,"x":72,"y":-9,"z":60},"front":[{"slot":"f1","model":"F12-W2L-D72C-W2R","width":144,"x":-68,"y":-9,"z":60}],"back":[{"slot":"b1","model":"B10x12","width":144,"x":-68,"y":-9,"z":-60}],"left":[{"slot":"l1","model":"L10-36C","width":120,"x":-71,"y":-9,"z":-60}],"right":[{"slot":"r1","model":"R10-36C","width":120,"x":71,"y":-9,"z":60}]}
    }
    if(model == 'solitude-12x16') {
      recipeResponse = {"model":"signature","size":"12x16","depth":12,"length":16,"name":"12x16 signature","shell_base_price":20308,"roof":{"model":"SG-12x16-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":192,"height":12,"depth":144,"x":96,"y":-9,"z":72},"front":[{"slot":"f1","model":"F16-W2L-D72C-W2R","width":144,"x":-92,"y":-9,"z":72}],"back":[{"slot":"b1","model":"B12x16","width":192,"x":-92,"y":-9,"z":-72}],"left":[{"slot":"l1","model":"L12-36C","width":144,"x":-95,"y":-9,"z":-72}],"right":[{"slot":"r1","model":"R12-36C","width":144,"x":95,"y":-9,"z":72}]}
    }
    if(model == 'pagoda-left-10x12') {
      recipeResponse = {"model":"signature","size":"10x12","depth":10,"length":12,"name":"10x12 signature","shell_base_price":14606,"roof":{"model":"SG-10x12-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":144,"height":12,"depth":120,"x":72,"y":-9,"z":60},"front":[{"slot":"f1","model":"F12-D36L","width":144,"x":-68,"y":-9,"z":60}],"back":[{"slot":"b1","model":"B10x12","width":144,"x":-68,"y":-9,"z":-60}],"left":[{"slot":"l1","model":"L10-36C-W2R","width":120,"x":-71,"y":-9,"z":-60}],"right":[{"slot":"r1","model":"R10-36C","width":120,"x":71,"y":-9,"z":60}]}
    }
    if(model == 'pagoda-left-12x16') {
      recipeResponse = {"model":"signature","size":"12x16","depth":12,"length":16,"name":"12x16 signature","shell_base_price":20308,"roof":{"model":"SG-12x16-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":192,"height":12,"depth":144,"x":96,"y":-9,"z":72},"front":[{"slot":"f1","model":"F16-D36L-36R","width":144,"x":-92,"y":-9,"z":72}],"back":[{"slot":"b1","model":"B12x16","width":192,"x":-92,"y":-9,"z":-72}],"left":[{"slot":"l1","model":"L12-36C-W2R","width":144,"x":-95,"y":-9,"z":-72}],"right":[{"slot":"r1","model":"R12-36C","width":144,"x":95,"y":-9,"z":72}]}
    }
    if(model == 'pagoda-right-10x12') {
      recipeResponse = {"model":"signature","size":"10x12","depth":10,"length":12,"name":"10x12 signature","shell_base_price":14606,"roof":{"model":"SG-10x12-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":144,"height":12,"depth":120,"x":72,"y":-9,"z":60},"front":[{"slot":"f1","model":"F12-D36R","width":144,"x":-68,"y":-9,"z":60}],"back":[{"slot":"b1","model":"B10x12","width":144,"x":-68,"y":-9,"z":-60}],"left":[{"slot":"l1","model":"L10-36C","width":120,"x":-71,"y":-9,"z":-60}],"right":[{"slot":"r1","model":"R10-W2L-36C","width":120,"x":71,"y":-9,"z":60}]}
    }
    if(model == 'pagoda-right-12x16') {
      recipeResponse = {"model":"signature","size":"12x16","depth":12,"length":16,"name":"12x16 signature","shell_base_price":20308,"roof":{"model":"SG-12x16-STE-06F","x":0,"y":-9,"z":8},"floor":{"width":192,"height":12,"depth":144,"x":96,"y":-9,"z":72},"front":[{"slot":"f1","model":"F16-36L-D36R","width":144,"x":-92,"y":-9,"z":72}],"back":[{"slot":"b1","model":"B12x16","width":192,"x":-92,"y":-9,"z":-72}],"left":[{"slot":"l1","model":"L12-36C","width":144,"x":-95,"y":-9,"z":-72}],"right":[{"slot":"r1","model":"R12-W2L-36C","width":144,"x":95,"y":-9,"z":72}]}
    }
    if(model == 'portland-studio-12x16') {
      recipeResponse = {"model":"portland","size":"12x16","depth":12,"length":16,"name":"12x16 portland","shell_base_price":66477,"roof":{"model":"PT-12x16-STV","x":0,"y":-9,"z":0},"floor":{"width":192,"height":12,"depth":144,"x":96,"y":-9,"z":72},"front":[{"slot":"f1","model":"PF16-4-W3-D72C","width":192,"x":-96,"y":-9,"z":71}],"back":[{"slot":"b1","model":"PB16","width":192,"x":96,"y":-9,"z":-71}],"left":[{"slot":"l1","model":"PL12-36C","width":144,"x":-95.5,"y":-9,"z":-66.5}],"right":[{"slot":"r1","model":"PR12-36C","width":144,"x":95,"y":-9,"z":66.5}]}
    }
    if(model == 'portland-studio-16x16') {
      recipeResponse = {"curated":true,"model":"portland","size":"16x16","depth":16,"length":16,"name":"16x16 portland","shell_base_price":84298,"roof":{"model":"PT-16x16-STV","x":0,"y":-9,"z":0},"floor":{"width":192,"height":12,"depth":192,"x":96,"y":-9,"z":96},"front":[{"slot":"f1","model":"PF16-4-W3-D72C","width":192,"x":-96,"y":-9,"z":95}],"back":[{"slot":"b1","model":"PB16","width":192,"x":96,"y":-9,"z":-95}],"left":[{"slot":"l1","model":"PL16-36C","width":144,"x":-95.5,"y":-9,"z":-90.5}],"right":[{"slot":"r1","model":"PR16-36C","width":192,"x":95,"y":-9,"z":90.5}],"panels":[]}
    }

    window.recipe = recipeResponse
    Harp.useRecipe()
  },
  loadConfigRecipe: async function () {
    if(Harp.config.product_size.includes('Summit')) {
      Harp.config.product = 'summit'
    }
    if(Harp.config.product_size.includes('Signature')) {
     Harp.config.product = 'signature'
    }
    if(Harp.config.product_size.includes('Portland')) {
     Harp.config.product = 'portland'
    }
    const recipeResponse = await fetch('/api/panel_map/' + Harp.config.product + '/depth/' + Harp.config.depth + '/length/' + Harp.config.length)
    recipe = await recipeResponse.json()
    return recipe
  },
  updateConfigWithNewRecipe: function() {
    if(typeof Harp.config.shipping_zip === 'undefined' || Harp.config.shipping_zip === null) {
      Harp.updatePanelThumbs()
      Harp.updateConfig()
      window.Components.saveConfig()
      setTimeout(function() {
        window.dispatchEvent(new CustomEvent('update-permit-plan-set'))
        window.dispatchEvent(new CustomEvent('update-interior'))
        window.dispatchEvent(new CustomEvent('update-exterior'))
        window.dispatchEvent(new CustomEvent('update-addons'))
        window.dispatchEvent(new CustomEvent('update-installation-type'))
      }, 1500);
      return
    } 
    fetch('/api/get_location_details', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        'zip': Harp.config.shipping_zip,
        'model': Harp.config.product,
        'length': Harp.config.length,
        'depth': Harp.config.depth,
        'interior_kit': Harp.config.interior_kit || null,
        'product_total': Harp.config.product_cost
      })
    })
    .then(response => response.json())
    .then(data => {    
      Harp.config.shipping_cost = data.shipping_cost  
      Harp.config.install_cost = data.install_cost
      Harp.config.installation = null
      Harp.updatePanelThumbs()
      Harp.updateConfig()
      window.Components.saveConfig()
      window.dispatchEvent(new CustomEvent('update-permit-plan-set'))
      window.dispatchEvent(new CustomEvent('update-interior'))
      window.dispatchEvent(new CustomEvent('update-exterior'))
      window.dispatchEvent(new CustomEvent('update-addons'))
      window.dispatchEvent(new CustomEvent('update-installation-type'))
    })
  },
  setModel: async function (model, depth, length) {
    //Clear interior layout to shell-only
    Harp.config.installation_price = 0
    Harp.config.front = {}
    Harp.config.front.slots = {}
    Harp.config.back = {}
    Harp.config.back.slots = {}
    Harp.config.left = {}
    Harp.config.left.slots = {}
    Harp.config.right = {}
    Harp.config.right.slots = {}
    Harp.config.interior_kit = 'shell-only'
    Harp.config.interior_kit_label = 'No interior'    
    Harp.config.product = model

    if(depth <= 14) {
      Harp.camera.spinTo('radius', 450, 100)
    } else {
      Harp.camera.spinTo('radius', 700, 100)
    }

    //Reset to lap if block was currently selected but the new model is not a signature
    if(model != 'signature' && Harp.config.siding === 'block') {
      Harp.config.siding_label = 'Lap Siding'
      Harp.config.siding = 'lap'
      Harp.config.siding_price = 0
      Harp.config.siding_code = 'LP'
    }

    if(model === 'signature' || model === 'portland') {
      Harp.config.permit_plans = null
    } else {
      Harp.config.permit_plans = 'includePermitPlans'
    }

    //unset eaves if not signature, or unset soffit/fascia if signature
    if(model === 'signature') {
      Harp.config.fascia_color = 'iron-gray'
      Harp.config.fascia_color_label = 'Iron Gray'      
      Harp.config.fascia_color_price = 0
      Harp.config.fascia_color_code = 'IG'
      Harp.config.soffit_color = 'iron-gray'
      Harp.config.soffit_color_label = 'Iron Gray'
      Harp.config.soffit_color_price = 0
      Harp.config.soffit_color_code = 'IG'
    } else {
      Harp.config.eaves_color = 'unfinished-eaves'
      Harp.config.eaves_color_label = 'Unfinished'
      Harp.config.eaves_color_price = 0
      Harp.config.eaves_color_code = 'SDUE'
    }

    const recipeResponse = await fetch('/api/panel_map/' + model + '/depth/' + depth + '/length/' + length)
    window.recipe = await recipeResponse.json()

    Harp.useRecipe()
    Harp.updateConfigWithNewRecipe()
    

     
  },
  setCamera: function (side) {
    if(Harp.config.depth <= 14) {
      Harp.camera.spinTo('radius', 450, 100)
    } else {
      Harp.camera.spinTo('radius', 700, 100)
    }
    if (side === 'exterior') {      
      if (Harp.camera.beta < BABYLON.Tools.ToRadians(60)) {        
        Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(70), 50)
      }
    }
    if (side === 'interior') {
      Harp.camera.spinTo('alpha', BABYLON.Tools.ToRadians(45), 50)
      Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(30), 50)
    }
    if (side === 'front') {
      Harp.camera.spinTo('alpha', Math.PI/2, 50)
      Harp.camera.spinTo('beta', Math.PI/2, 50)
    }
    if (side === 'back') {
      Harp.camera.spinTo('alpha', -Math.PI/2, 50)
      Harp.camera.spinTo('beta', Math.PI/2, 50)
    }
    if (side === 'left') {
      Harp.camera.spinTo('alpha', Math.PI, 50)
      Harp.camera.spinTo('beta', Math.PI/2, 50)
    }
    if (side === 'right') {
      Harp.camera.spinTo('alpha', 0, 50)
      Harp.camera.spinTo('beta', Math.PI/2, 50)
    }
  }, 
  getIndex: function (idx = 0, panelSlotArray, direction) {
   switch (direction) {
     case 'next': return (idx + 1) % panelSlotArray.length
     case 'prev': return (idx == 0) && panelSlotArray.length - 1 || idx - 1
     default:     return idx
   }
  },
  nextPanel: function (side, panelSlot) {
    idx = Harp.getIndex(idx, window.recipe.panels[panelSlot], 'next')
    Harp.importAndPositionPanel(side, panelSlot, window.recipe.panels[panelSlot][idx])
    Harp.updateConfig()
  },
  prevPanel: function (side, panelSlot) {
    idx = Harp.getIndex(idx, window.recipe.panels[panelSlot], 'prev')
    Harp.importAndPositionPanel(side, panelSlot, window.recipe.panels[panelSlot][idx])
    Harp.updateConfig()
  },
  deactivatePanel: function() {
    if (document.querySelector('.activePanel')) {      
      document.querySelector('.activePanel').classList.add('border-gray-300', 'bg-white', 'hover:bg-yellow-50')
      document.querySelector('.activePanel').classList.remove('animate-pulse', 'border-yellow-500', 'bg-yellow-50', 'activePanel')
    }
  },
  activatePanel: function(e) {    
    if (document.querySelector('.activePanel')) {
      //document.querySelector('.activePanel').nextElementSibling.classList.add('hidden')
      document.querySelector('.activePanel').classList.add('border-gray-300', 'bg-white', 'hover:bg-yellow-50')
      document.querySelector('.activePanel').classList.remove('animate-pulse', 'border-yellow-500', 'bg-yellow-50', 'activePanel')
    }
    
    e.classList.remove('border-gray-300', 'bg-white', 'hover:bg-yellow-50')
    e.classList.add('border-yellow-500', 'bg-yellow-50', 'activePanel', 'animate-pulse')
    //e.nextElementSibling.classList.remove('hidden')

    //CUSTOM PANEL EVENT    
    window.dispatchEvent(new CustomEvent('activate-front-config-details'))
    
  },
  generatePanelMenu: function(side) {
    return
  },
  needsTrimCode: function(panel) {
    return
  },
  getDoor72Qty: function() {
    return
  },
  getDoor36Qty: function() {
    return
  },
  getWindowQty: function() {
    return
  },
  updateOptionsConfigArray: function() {
    return
  },
  updateInteriorConfigArray: function() {
    return
  },
  updateElevationConfig: function(side) {
    return
  },
  updatePanelThumbs: function() {
    return
  },
  updateConfigParam: function(item, sku, label = null, price = null) {
    Harp.config[item] = sku

    if(label !== null) {
      Harp.config[item + '_label'] = label
    }

    if(price !== null) {
      Harp.config[item + '_price'] = price
    }
    if(Harp.bomCodes.hasOwnProperty(sku)) {
      Harp.config[item + '_code'] = Harp.bomCodes[sku]
    }
  },
  calculatePanelCost: function(panel) {
    return
  },
  updateConfig: function() {
    return
  },
  init: function () {
    Harp.materialGroups.forEach(function (group){
      Harp[group].setEnabled(false)
    })    
    Harp['appliance'].setEnabled(true);
    Harp['counter'].setEnabled(true);
    Harp['cabinet'].setEnabled(true);
    Harp['white'].setEnabled(true);
    Harp['black'].setEnabled(true);
    Harp['fixture'].setEnabled(true);
    Harp['fixture1'].setEnabled(true);
    Harp['bathroom_floor'].setEnabled(true);
    Harp['glass'].setEnabled(true)
    Harp['trim_color'].setEnabled(true)
    Harp['window_exterior'].setEnabled(true)
    Harp['lumber'].setEnabled(true)
    Harp['lounge_wood'].setEnabled(true)
    Harp['lounge_cushion'].setEnabled(true)
    Harp['Fence'].setEnabled(true)
    Harp['Fence1'].setEnabled(true)
    Harp['PAthway_C'].setEnabled(true)
    Harp['shed_Deck'].setEnabled(true)
    Harp['Deck_Light'].setEnabled(true)
    Harp['Deck_Light_Glass'].setEnabled(true)
    Harp['Planter'].setEnabled(true)
    Harp['PlanterPlant'].setEnabled(true)
    Harp['potsoil'].setEnabled(true)
    Harp['TallPot'].setEnabled(true)
    Harp['ShortPot'].setEnabled(true)
    Harp['FarPot'].setEnabled(true)    
    Harp['ShortPlant'].setEnabled(true)
    Harp['FarPlant'].setEnabled(true)    
    Harp['Lantern'].setEnabled(true)
    Harp['LanternGlass'].setEnabled(true)
    Harp['Perimeter_wall'].setEnabled(true)
    Harp['Grass_Ground'].setEnabled(true)
    Harp['door_color'].setEnabled(true)
    Harp['roof_eave'].setEnabled(true)
    Harp['roof_fascia'].setEnabled(true)
    Harp['roof_metal'].setEnabled(true)
    Harp['framing'].setEnabled(true)
    Harp['sheathing'].setEnabled(true)
    Harp['eave_rafter'].setEnabled(true)
    Harp['eave_plywood'].setEnabled(true)
    
    Harp.setColor('glass', Harp.colors['glass'])
    Harp.glass_material.alpha = 0.25
    
    let woodTexture = new BABYLON.Texture(Harp.textures['wood'])
    woodTexture.uScale = woodTexture.vScale = 0.015
    woodTexture.specular = 5
    Harp.setColor('lumber', Harp.colors['white'])
    Harp.lumber_material.diffuseTexture = woodTexture
    
    Harp.setColor('eave_rafter', Harp.colors['natural-stain'])
    Harp.eave_rafter_material.diffuseTexture = woodTexture
    
    Harp.setColor('eave_plywood', Harp.colors['natural-stain'])
    Harp.eave_plywood_material.diffuseTexture = woodTexture
    Harp.setColor('lounge_wood', Harp.colors['pearl-gray'])
    Harp.lounge_wood_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])
    Harp.setColor('Fence', Harp.colors['pearl-gray'])
    Harp.Fence_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])
    Harp.setColor('Fence1', Harp.colors['pearl-gray'])
    Harp.Fence1_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])
    Harp.setColor('PAthway_C', Harp.colors['white'])
    Harp.PAthway_C_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    Harp.PAthway_C_material.specularPower = 4
    Harp.PAthway_C_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('shed_Deck', Harp.colors['white'])
    Harp.shed_Deck_material.diffuseTexture = new BABYLON.Texture(Harp.textures['wood_deck'])
    Harp.shed_Deck_material.specularPower = 4
    Harp.shed_Deck_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('PlanterPlant', Harp.colors['pearl-gray'])
    Harp.PlanterPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
    Harp.PlanterPlant_material.specularPower = 4
    Harp.PlanterPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('Deck_Light', Harp.colors['tricorn-black'])
    Harp.setColor('Deck_Light_Glass', Harp.colors['glass'])
    Harp.setColor('Lantern', Harp.colors['rich-espresso'])
    
    Harp.setColor('LanternGlass', Harp.colors['glass'])
    Harp.LanternGlass_material.alpha = 0.25
    Harp.setColor('lounge_cushion', Harp.colors['cobble-stone'])
    
    Harp.setColor('TallPot', Harp.colors['tricorn-black'])
    Harp.TallPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    Harp.TallPot_material.specularPower = 4
    Harp.TallPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('ShortPot', Harp.colors['iron-gray'])
    Harp.ShortPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    Harp.ShortPot_material.specularPower = 4
    Harp.ShortPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('FarPot', Harp.colors['iron-gray'])
    Harp.FarPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    Harp.FarPot_material.specularPower = 4
    Harp.FarPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      
    Harp.setColor('ShortPlant', Harp.colors['white'])
    Harp.ShortPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
    Harp.ShortPlant_material.specularPower = 4
    Harp.ShortPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
    Harp.setColor('FarPlant', Harp.colors['white'])
    Harp.FarPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
    Harp.FarPlant_material.specularPower = 4
    Harp.FarPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
  
    Harp.setColor('Planter', Harp.colors['pearl-gray'])
    Harp.Planter_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    Harp.setColor('potsoil', Harp.colors['rich-espresso'])
    Harp.setColor('Perimeter_wall', Harp.colors['white'])
    Harp.Perimeter_wall_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
    
    Harp.setColor('appliance', Harp.colors['appliance'])    
    Harp.setColor('sheathing', Harp.colors['arctic-white'])
    Harp.sheathing_material.diffuseTexture = new BABYLON.Texture(Harp.textures['wood'])
    Harp.sheathing_material.diffuseTexture.uScale = 0.01
    Harp.sheathing_material.diffuseTexture.vScale = 0.01
    Harp.sheathing_material.specularPower = 7.5
    Harp.setColor('framing', Harp.colors['white'])
    Harp.framing_material.diffuseTexture = new BABYLON.Texture(Harp.textures['wood'])
    Harp.framing_material.diffuseTexture.uScale = 0.01
    Harp.framing_material.diffuseTexture.vScale = 0.01
    Harp.framing_material.specularPower = 7.5
    Harp.metal_wainscot_material.specularPower = 4  
    Harp.metal_wainscot1_material.specularPower = 4  
    
    Harp.trim_color_material.specularPower = 15
    Harp.window_exterior_material.specularPower = 10
    Harp.plank_trim_material.specularPower = 5
    Harp.plank_siding_trims_material.specularPower = 5
    Harp.plank_siding_metal_trims_material.specularPower = 5
    Harp.plank_trims_material.specularPower = 5
    Harp.block_siding_trims_material.specularPower = 5
    Harp.block_siding_metal_trims_material.specularPower = 5    
    Harp.roof_metal_material.specularPower = 20
    Harp.roof_metal_material.specularColor = new BABYLON.Color3(0.33, 0.33, 0.33)


    Harp.setSiding('lap', null)
    Harp.setSidingColor('iron-gray')
    Harp.setTrimColor('aluminum', null)
    Harp.setSoffitColor('aluminum')
    Harp.setFasciaColor('aluminum')
    Harp.importInteriorLayout('lifestyle')
  }
}

  const scene = createScene()
  scene.executeWhenReady(function () {
    Harp.init()
    setTimeout(function(){
      document.querySelector('#renderCanvas').removeAttribute('style')
      engine.resize()
    }, 1500);
  })

  engine.runRenderLoop(function () {
    scene.render()
  })

  document.querySelector('#renderCanvas').addEventListener('wheel', evt => evt.preventDefault())

  window.addEventListener("resize", function () {
    engine.resize()
  })
  window.Harp = Harp
})