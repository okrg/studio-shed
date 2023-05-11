window.Harp = {}
BABYLON.OBJFileLoader.OPTIMIZE_WITH_UV = true
BABYLON.OBJFileLoader.SKIP_MATERIALS = true
BABYLON.ArcRotateCamera.prototype.spinTo = function (whichprop, targetval, speed) {
  var ease = new BABYLON.CubicEase()
  ease.setEasingMode(BABYLON.EasingFunction.EASINGMODE_EASEINOUT)
  BABYLON.Animation.CreateAndStartAnimation('at4', this, whichprop, speed, 120, this[whichprop], targetval, 0, ease)
}

window.addEventListener('DOMContentLoaded', () => {

  const canvas = document.getElementById('renderCanvas')
  const loadEvent = new CustomEvent('configurator_loaded', {
    bubbles: true,
    cancelable: true
  })

  const loader = document.createElement('div')
  function removeLoader() {
    // Remove the #loader element from the DOM
    loader.remove();
  }

// Add an event listener for the 'transitionend' event
  loader.addEventListener('transitionend', removeLoader, { once: true });

  loader.setAttribute('id', 'loader')
  let dots = window.setInterval( function() {
    if ( loader.innerHTML.length > 2 )
      loader.innerHTML = "";
    else
      loader.innerHTML += ".";
  }, 500);

  canvas.before(loader)


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
    Harp.camera.zoomToMouseLocation = true
    Harp.camera.useNaturalPinchZoom = true
    Harp.camera.upperBetaLimit = Math.PI / 2
    Harp.camera.upperRadiusLimit = 800
    Harp.camera.lowerRadiusLimit = 12
    Harp.camera.angularSensibilityX = 5000
    Harp.camera.angularSensibilityY = 5000
    Harp.camera.attachControl(canvas, true)
    if(Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1) {
      Harp.camera.inputs.remove(Harp.camera.inputs.attached.mousewheel)
    }

    var pipeline = new BABYLON.DefaultRenderingPipeline(
      "defaultPipeline",
      true,
      scene,
      [Harp.camera]
    );
    pipeline.samples = 8;
    pipeline.imageProcessingEnabled = true;
    pipeline.fxaaEnabled = true;
    pipeline.grainEnabled = true;
    pipeline.grain.intensity = 5;
    pipeline.bloomEnabled = true;
    pipeline.bloomThreshold = 0.8;
    pipeline.bloomWeight = 0.25;
    pipeline.bloomKernel = 16;
    pipeline.bloomScale = 0.5;

    //Lighting **********
    const ambient = new BABYLON.HemisphericLight('ambient', new BABYLON.Vector3(0, 1, 0), scene)
    ambient.diffuse = new BABYLON.Color3(0.66 , 0.66, 0.66)
    ambient.specular = new BABYLON.Color3(0.66 , 0.66, 0.66)
    ambient.intensity = 1
    ambient.groundColor = new BABYLON.Color3(0.66 , 0.66, 0.66)

    const sun = new BABYLON.DirectionalLight('sun', new BABYLON.Vector3(-1, -2, -1), scene)
    sun.position = new BABYLON.Vector3(20, 40, 20);
    sun.intensity = 0.6

    Harp.shadowGenerator = new BABYLON.ShadowGenerator(1024, sun)
    Harp.shadowGenerator.darkness = 0
    Harp.shadowGenerator.useBlurCloseExponentialShadowMap = true
    Harp.shadowGenerator.useBlurExponentialShadowMap = true
    Harp.shadowGenerator.useKernelBlur = true
    Harp.shadowGenerator.blurKernel = 42


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
            Harp.shadowGenerator.getShadowMap().renderList.push(m)
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
      Harp.shadowGenerator.getShadowMap().renderList.push(Harp.foundationContainer.meshes[0]);
      Harp.foundationMesh.material = Harp.foundation_material
      Harp.foundation_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.foundation_material.specularPower = 32


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


    //Default routine  **********
    Harp.useRecipe = function () {
      Harp.config = {}
      Harp.config.product = window.recipe.model
      Harp.config.size = window.recipe.size
      Harp.config.area = window.recipe.length * window.recipe.depth
      Harp.config.length = window.recipe.length
      Harp.config.depth = window.recipe.depth
      Harp.config.endcut = 'ogee'

      Harp.productContainer = new BABYLON.AssetContainer(scene)

      BABYLON.SceneLoader.ImportMesh('', '/assets/obj/', Harp.config.product + '-' + Harp.config.size + '.obj', scene, function (newMeshes) {
          newMeshes.forEach(function (m){
            Harp.productContainer.meshes.push(m)
            m.receiveShadows = true
            Harp.shadowGenerator.getShadowMap().renderList.push(m);

            Harp.materialGroups.forEach(function (group){
              if (m.name.includes(group)) {
                m.parent = Harp[group]
                m.material = Harp[group + '_material']
              }
            })

            m.position.z = 0
            m.position.y = 0
            m.position.x = 0
          })
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
      'trim_color',
      'lumber',
      'sheathing',
      'framing'
    ],
    finishGroups: [
      'white',
      'black',
      'fixture'
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
      'sandcastle-oak': 'https://shop.studio-shed.com/assets/textures/sandcastle-oak.jpg'
    },
    setColor: function (group, rgb) {
      rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',')
      color = new BABYLON.Color3.FromInts(rgb[0], rgb[1], rgb[2])
      for (var i = 0; i < Harp[group].getChildMeshes(false).length; i++){
        Harp[group].getChildMeshes(false)[i].material.diffuseColor = color
      }
    },
    setEndCut: function(endcut) {

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



        if (Object.keys(window.colorway).length > 0 && window.colorway['windowTrim'] === 'ebony') {
          Harp.setColor('window_exterior', Harp.colors['tricorn-black'])
          Harp.updateConfigParam('window_casement', 'ebony', 'Ebony')
        } else {
          Harp.setColor('window_exterior', Harp.colors['pebble-gray'])
          Harp.updateConfigParam('window_casement', 'pebble-gray', 'Pebble Gray')
        }
      }
      if(color === 'studio-shed-bronze') {
        Harp.setSoffitColor('studio-shed-bronze')
        Harp.setFasciaColor('studio-shed-bronze')
        Harp.setColor('window_exterior', Harp.colors['tricorn-black'])
        Harp.updateConfigParam('window_casement', 'ebony', 'Ebony')
      }
      Harp.updateConfigParam('trim_color', color)
    },
    setSiding: function (siding) {
      //Harp['trim_color'].setEnabled(false)
      Harp.config.siding = siding
      Harp.wood_texture.setEnabled(false)
      Harp.wood_texture_metal.setEnabled(false)
      Harp.wood_texture_trims.setEnabled(false)
      Harp.wood_texture_metal_trims.setEnabled(false)

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
    ucfirst: function(string) {
      return string[0].toUpperCase() + string.slice(1);
    },
    formatPrice: new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }),
    loadDefaultRecipe: function(model = null) {
      let recipeResponse = {}
      if(model == null) {
        model = document.querySelector('#renderCanvas').getAttribute('data-big-timber-model')
      }
      if(model == 'santa-monica-10x10') {
        window.recipe = {"model":"santa-monica","size":"10x10","depth":10,"length":10}
      }

      Harp.useRecipe()


    },
    setCamera: function (side) {
      if(Harp.config.depth <= 14) {
        Harp.camera.spinTo('radius', 450, 100)
      } else {
        Harp.camera.spinTo('radius', 700, 100)
      }
      if (side === 'exterior') {
        if (Harp.camera.beta < BABYLON.Tools.ToRadians(60)) {
          Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(90), 66)
        }
      }
      if (side === 'interior') {
        Harp.camera.spinTo('alpha', BABYLON.Tools.ToRadians(45), 66)
        Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(30), 66)
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
      Harp['white'].setEnabled(true);
      Harp['black'].setEnabled(true);
      Harp['glass'].setEnabled(true)
      Harp['trim_color'].setEnabled(true)
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

      Harp.setColor('glass', Harp.colors['glass'])
      Harp.glass_material.alpha = 0.25

      let woodTexture = new BABYLON.Texture(Harp.textures['wood'])
      woodTexture.uScale = woodTexture.vScale = 0.015
      woodTexture.specular = 5
      Harp.setColor('lumber', Harp.colors['white'])
      Harp.lumber_material.diffuseTexture = woodTexture

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

      Harp.trim_color_material.specularPower = 15

      Harp.setEndCut('ogee')
    }
  }

  const scene = createScene()

  scene.executeWhenReady(function () {
    Harp.init()
    setTimeout(function(){
      document.querySelector('#renderCanvas').removeAttribute('style')
      document.querySelector('#loader').classList.add('fade-out');
      engine.resize()
      document.dispatchEvent(loadEvent);
      window.dispatchEvent(new CustomEvent('update-exterior'))
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